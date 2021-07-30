<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('user','UserController');

Route::get('state/{stateId}/user','UserController@FindByState');
Route::get('city/{cityId}/user','UserController@FindByCity');

Route::resource('city','CityController');

Route::resource('state','StateController');

Route::resource('address','AddressController');
