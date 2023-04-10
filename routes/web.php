<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import_product_from_csv', [ProductController::class, 'import']) -> name('import_product_from_csv');
Route::get('/import_collection_from_csv', [CollectionController::class, 'import']) -> name('import_collection_from_csv');

Route::get('/product_index', [ProductController::class, 'index_all']) -> name('product_index');
Route::get('/keramogranit_index', [ProductController::class, 'index_keramogranit']) -> name('index_keramogranit');
Route::get('/plitka_index', [ProductController::class, 'index_plitka']) -> name('index_plitka');
Route::get('/mosaic_index', [ProductController::class, 'index_mosaic']) -> name('index_mosaic');
Route::get('/decor_index', [ProductController::class, 'index_decor']) -> name('index_decor');
Route::get('/search', [ProductController::class, 'search']) -> name('search');

Route::get('/product/{id?}', [ProductController::class, 'show']) -> name('show');

Route::get('/ddooww/{id?}', [Controller::class, 'down'])->name('img_url');
Route::get('/index/{id?}', [Controller::class, 'index2']);
