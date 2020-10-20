<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
    return view('welcome');
});

Route::get('product/{slug}', $url . '\ProductController@showProduct');
Route::resource('product', $url . '\ProductController');
//EXPORT
Route::get('product/export/xlsx', $url . '\ProductController@exportXL');
Route::get('product/export/csv', $url . '\ProductController@exportCSV');
Route::get('product/export/pdf', $url . '\ProductController@exportPDF');
//IMPORT
Route::get('upload', $url . '\productController@upload');
Route::post('product/upload/data', $url . '\productController@uploadData');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
