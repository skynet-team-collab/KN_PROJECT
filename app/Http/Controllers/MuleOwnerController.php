<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class MuleOwnerController extends Controller
{
    public function createOwner() {
        return view('mule_Owner');
    }

    public function storeOwnerInSession(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'address' => 'required|string',
            'photo' => 'required|image|max:2048',
            'aadhaar' => 'required|string',
            'police_verification' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'mobile_number' => 'required|string|max:15',
        ]);

        $photoPath = $request->file('photo')->store('temp');
        $policePath = $request->file('police_verification')
            ? $request->file('police_verification')->store('temp')
            : null;

        session([
            'owner' => [
                'name' => $validated['name'],
                'age' => $validated['age'],
                'address' => $validated['address'],
                'photo' => $photoPath,
                'aadhaar' => $validated['aadhaar'],
                'police_verification' => $policePath,
                'mobile_number' => $validated['mobile_number'],
            ]
        ]);

        return redirect()->route('mule.form');
    }

    public function createMule() {
        return view('mule');
    }

    public function storeMuleAndOwner(Request $request) {
        $request->validate([
            'mule_count' => 'required|integer|min:1|max:10',
            'mules.*.name' => 'required|string',
            'mules.*.breed' => 'required|string',
            'mules.*.age' => 'required|integer|min:0',
        ]);

        $owner = session('owner');

        if (!$owner) {
           return redirect()->route('mule.owner.form')->with('success', 'Registration successful!');
        }

        $photoFinalPath = str_replace('temp/', 'public/photos/', $owner['photo']);
        Storage::move($owner['photo'], $photoFinalPath);

        $policeFinalPath = $owner['police_verification']
            ? str_replace('temp/', 'public/docs/', $owner['police_verification'])
            : null;

        if ($policeFinalPath) {
            Storage::move($owner['police_verification'], $policeFinalPath);
        }

        DB::beginTransaction();
        try {
            $ownerId = DB::table('mule_owners')->insertGetId([
                'name' => $owner['name'],
                'age' => $owner['age'],
                'address' => $owner['address'],
                'photo_path' => $photoFinalPath,
                'aadhaar_number' => $owner['aadhaar'],
                'police_verification_path' => $policeFinalPath,
                'mobile_number' => $owner['mobile_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($request->mules as $mule) {
                DB::table('mules')->insert([
                    'owner_id' => $ownerId,
                    'name' => $mule['name'],
                    'breed' => $mule['breed'],
                    'age' => $mule['age'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            session()->forget('owner');

            return redirect()->route('success.page')->with('success', 'Mule Owner & Mules registered successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

   public function showOwners()
{
    $owners = DB::table('mule_owners')->get();

    $mules = DB::table('mules')->get()->groupBy('owner_id');

    return view('fetchdata', [
        'mule_owners' => $owners,
        'mules_by_owner' => $mules
    ]);
}

}
