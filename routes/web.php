<?php

use App\Models\countries;
use App\Models\cities;
use App\Models\municipalities;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    $countries = countries::all();
    $cities = cities::all();
    $municipalities = municipalities::all();
    return view('welcome',compact('countries','cities','municipalities'));

});

Route::get('api/country/city/{id}', function ($id) {
    
    $cities = cities::where('country_id',$id)->get();
    return response()->json($cities);

});
