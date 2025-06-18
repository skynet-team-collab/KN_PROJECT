<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User; 
use Illuminate\Support\Facades\DB;

class FetchController extends Controller
{
    public function fetchData()
    {
        // Using Eloquent (Recommended)
       // $users = User::all();
        
        // Alternative using Query Builder:
         $users = DB::table('mule_owners')->get();
        
        return view('fetchdata', ['mule_owners' => $users]);
    }
}
