<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatagoryController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::resources([
        'catagories'=>CatagoryController::class
    ]);
    Route::get('catagory/delete/{id}', [CatagoryController::class, 'destroy'])->name('destroy');
    Route::get('/api/catagories', [CatagoryController::class, 'getCatagoriesJson']);

    Route::resources([
        'brands'=>BrandController::class
    ]);
    Route::get('brand/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');

    Route::resources([
        'sizes'=>SizeController::class
    ]);
    Route::get('size/delete/{id}', [SizeController::class, 'destroy'])->name('destroy');

    Route::resources([
        'products'=>ProductController::class
    ]);
    Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

});


