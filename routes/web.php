<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});

Route::get('/owner', function() {
    return view(('mule_Owner'));
});

Route::get('/mule', function() {
    return view(('mule'));
});

Route::get('/part', function() {
    return ('Hello');
});

Route::post('/part', function() {
    return ('Hello');
});