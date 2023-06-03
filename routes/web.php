<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AvitoController;
use App\Http\Controllers\TelegramSendController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AquaFloorController;
use App\Http\Controllers\MyHelpController;

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


// ------------------IMPORT_FROM_BAUSERVIS_TO_DATABASE----------------------
Route::get('/import_product_from_csv', [ProductController::class, 'import']) -> name('import_product_from_csv');
Route::get('/import_collection_from_csv', [CollectionController::class, 'import']) -> name('import_collection_from_csv');
Route::get('/many', [Controller::class, 'many'])->name('many');
Route::get('/download_all_collections', [CollectionController::class, 'download_all_collections']) -> name('download_all_collections');
Route::get('/download_all/{pic?}', [ProductController::class, 'download_all']) -> name('download_all');

// -----------------------------------------------------------------------------
Route::get('/', [ProductController::class, 'index_all']) -> name('product_index');
Route::get('/keramogranit_index', [ProductController::class, 'index_keramogranit']) -> name('index_keramogranit');
Route::get('/plitka_index', [ProductController::class, 'index_plitka']) -> name('index_plitka');
Route::get('/mosaic_index', [ProductController::class, 'index_mosaic']) -> name('index_mosaic');
Route::get('/decor_index', [ProductController::class, 'index_decor']) -> name('index_decor');
Route::get('/search', [ProductController::class, 'search']) -> name('search');
Route::get('/size', [ProductController::class, 'index_size']) -> name('index_size');
Route::get('/cersanit', [ProductController::class, 'cersanit']);

Route::view('/size_form', 'size_form') -> name('index_size_form');
Route::get('/collection/{name}', [ProductController::class, 'collection_name']);
Route::get('/product/{id?}', [ProductController::class, 'show']) -> name('show');
Route::get('/ddooww/{id?}', [Controller::class, 'down'])->name('img_url');
Route::get('/index/{id?}', [Controller::class, 'index2']);
Route::get('/index_collection', [CollectionController::class, 'index']) -> name('index_collection');
Route::get('/index_ker/{price?}/{count?}', [ProductController::class, 'index_ker']) -> name('index_ker');
Route::get('/index_plit/{price?}/{count?}', [ProductController::class, 'index_plit']) -> name('index_plit');

// --------------------CREATE_AVITO_FILE--------------------------------------
Route::get('/avito_export', [AvitoController::class, 'export']);

// ----------------------TELEGRAM-------------------------------------------------
Route::get('/telegram/skip/{skip}/send/{count}', [TelegramSendController::class, 'send']) -> name('send_to_telegram');

// --------------------------QRCODE--------------------------------------------
Route::get('/qr_code/show', [QrCodeController::class, 'show']) -> name('qr_code_show');
Route::get('/scan_qr', [QrCodeController::class, 'scan']) -> name('scan_qr');


Route::get('/img/{path}', [ImageController::class, 'show'])->where('path', '.*')->name('img_sm');

// -----------------AQUAFLOOR-----------------------
Route::get('/aquafloor/import', [AquaFloorController::class, 'import'])->name('aqua_flor_import');
Route::get('/aquafloor/download_pic', [AquaFloorController::class, 'download_pic']);
Route::get('/aquafloor/index', [AquaFloorController::class, 'index'])->name('aquafloor_index');
Route::get('/aquafloor/index_collections', [AquaFloorController::class, 'index_collections'])->name('aquafloor_index_collections');
Route::get('/aquafloor/collection/{collection_name}', [AquaFloorController::class, 'index_one_collection']);
Route::get('/aquafloor/product/{title}', [AquaFloorController::class, 'index_product']);

// ----------------HELP_CONTROLLER----------------
Route::get('/list-all', [MyHelpController::class, 'list']);
Route::get('/biggest', [MyHelpController::class, 'biggest']);

//--------------------PRIMAVERA------------------------
Route::get('/primavera/import', [\App\Http\Controllers\PrimaveraController::class, 'import']);
Route::get('/primavera', [\App\Http\Controllers\PrimaveraController::class, 'index'])->name('primavera.index');
Route::get('/primavera/download-pic', [\App\Http\Controllers\PrimaveraController::class, 'download_pic']);
Route::get('/primavera/{id}', [\App\Http\Controllers\PrimaveraController::class, 'show'])->name('primavera.show');

//-------------------PHOTO------------------------
Route::any('photo', [\App\Http\Controllers\PhotoController::class, 'store'])->name('save-foto');
Route::any('photo-delete', [\App\Http\Controllers\PhotoController::class, 'delete'])->name('photo.delete');
