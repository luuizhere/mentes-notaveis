<?php

use Illuminate\Support\Facades\Route;


Route::resource('user','UserController');

Route::resource('city','CityController');

Route::resource('state','StateController');

Route::resource('address','AddressController');

