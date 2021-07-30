<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('user','UserController');

Route::get('user/state/{stateId}','UserController@FindByState');
Route::get('user/city/{cityId}','UserController@FindByCity');

Route::resource('city','CityController');
Route::resource('state','StateController');

Route::resource('address','AddressController');

