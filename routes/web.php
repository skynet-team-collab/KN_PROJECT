<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuleOwnerController;

Route::get('/', function() {
    return view('home');
});

Route::get('/register', function() {
    return view('mule_Owner');
});

// Route for owner registration
Route::get('/register/owner', [MuleOwnerController::class, 'createOwner'])->name('mule.owner.form');
Route::post('/register/owner/next', [MuleOwnerController::class, 'storeOwnerInSession'])->name('mule.owner.next');

// Route for Mule registration
Route::get('/register/mule', [MuleOwnerController::class, 'createMule'])->name('mule.form');
Route::post('/register/mule/submit', [MuleOwnerController::class, 'storeMuleAndOwner'])->name('mule.submit');


// route for Sucess message
Route::get('/register/success', function () {
    return view('success');
})->name('success.page');

// route for table
Route::get('/mule-owners', [MuleOwnerController::class, 'showOwners'])->name('owners.list');

Route::get('/fetch-owners', [MuleOwnerController::class, 'showOwners'])->name('fetch.owners');