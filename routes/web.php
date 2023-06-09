<?php

use App\Http\Controllers\AquaFloorController;
use App\Http\Controllers\AvitoController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyHelpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TelegramSendController;
use Illuminate\Support\Facades\Route;

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
Route::get('/import_product_from_csv', [ProductController::class, 'import'])->name('import_product_from_csv');
Route::get('/import_collection_from_csv', [CollectionController::class, 'import'])->name('import_collection_from_csv');
Route::get('/many', [Controller::class, 'many'])->name('many');
Route::get('/download_all_collections', [CollectionController::class, 'download_all_collections'])->name('download_all_collections');
Route::get('/download_all/{pic?}', [ProductController::class, 'download_all'])->name('download_all');

// -----------------------------------------------------------------------------
Route::get('/', [ProductController::class, 'index_all'])->name('product_index');
Route::get('/keramogranit_index', [ProductController::class, 'index_keramogranit'])->name('index_keramogranit');
Route::get('/plitka_index', [ProductController::class, 'index_plitka'])->name('index_plitka');
Route::get('/mosaic_index', [ProductController::class, 'index_mosaic'])->name('index_mosaic');
Route::get('/decor_index', [ProductController::class, 'index_decor'])->name('index_decor');
//Route::get('/search', [ProductController::class, 'search']);
Route::get('/size', [ProductController::class, 'index_size'])->name('index_size');
Route::get('/cersanit', [ProductController::class, 'cersanit']);

Route::view('/size_form', 'size_form')->name('index_size_form');
Route::get('/collection/{name}', [ProductController::class, 'collection_name']);
Route::get('/product/{id?}', [ProductController::class, 'show'])->name('show');
Route::get('/ddooww/{id?}', [Controller::class, 'down'])->name('img_url');
Route::get('/index/{id?}', [Controller::class, 'index2']);
Route::get('/index_collection', [CollectionController::class, 'index'])->name('index_collection');
Route::get('/index_ker/{price?}/{count?}', [ProductController::class, 'index_ker'])->name('index_ker');
Route::get('/index_plit/{price?}/{count?}', [ProductController::class, 'index_plit'])->name('index_plit');

// --------------------CREATE_AVITO_FILE--------------------------------------
Route::get('/avito_export/{foto?}', [AvitoController::class, 'export']);

// ----------------------TELEGRAM-------------------------------------------------
Route::get('/telegram/skip/{skip}/send/{count}', [TelegramSendController::class, 'send'])->name('send_to_telegram');

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
Route::get('/derevo', [MyHelpController::class, 'derevo']);
Route::get('/count-product-with-foto', [MyHelpController::class, 'count_product_with_foto']);
Route::get('/not-found-rezults', [MyHelpController::class, 'not_found_rezults']);

//---------------------SEARCH_CONTROLLER---------------
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

//--------------------PRIMAVERA------------------------
Route::get('/primavera/import', [\App\Http\Controllers\PrimaveraController::class, 'import']);
Route::get('/primavera', [\App\Http\Controllers\PrimaveraController::class, 'index'])->name('primavera.index');
Route::get('/primavera/download-pic', [\App\Http\Controllers\PrimaveraController::class, 'download_pic']);
Route::get('/primavera/{id}', [\App\Http\Controllers\PrimaveraController::class, 'show'])->name('primavera.show');
Route::get('/primavera-search', [\App\Http\Controllers\PrimaveraController::class, 'search'])->name('primavera.search');
Route::view('/primavera-search-form','primavera.search')->name('primavera.search.form');

//-------------------PHOTO------------------------
Route::any('photo', [\App\Http\Controllers\PhotoController::class, 'store'])->name('save-foto');
Route::any('photo-primavera', [\App\Http\Controllers\PhotoController::class, 'store_primavera'])->name('save-foto-primavera');
Route::any('photo-absolut_gres', [\App\Http\Controllers\PhotoController::class, 'store_absolut_gres'])->name('save-foto-absolut_gres');
Route::any('photo-leedo', [\App\Http\Controllers\PhotoController::class, 'store_leedo'])->name('save-foto-leedo');
Route::any('photo-altacera', [\App\Http\Controllers\PhotoController::class, 'store_altacera'])->name('save-foto-altacera');
Route::any('photo-delete', [\App\Http\Controllers\PhotoController::class, 'delete'])->name('photo.delete');
Route::any('photo-delete-primavera', [\App\Http\Controllers\PhotoController::class, 'delete_primavera'])->name('photo-primavera.delete');
Route::any('photo-delete-absolut_gres', [\App\Http\Controllers\PhotoController::class, 'delete_absolut_gres'])->name('photo-absolut_gres.delete');
Route::any('photo-delete-leedo', [\App\Http\Controllers\PhotoController::class, 'delete_leedo'])->name('photo-leedo.delete');
Route::any('photo-delete-altacera', [\App\Http\Controllers\PhotoController::class, 'delete_altacera'])->name('photo-altacera.delete');

//------------------- ORDERS ROUTES --------------------
Route::group(['prefix' => 'admin/orders'], function () {
    Route::get('/', \App\Http\Controllers\Adminlte\Order\IndexController::class)->name('order.index');
    Route::get('/create', \App\Http\Controllers\Adminlte\Order\CreateController::class)->name('order.create');
    Route::post('/', \App\Http\Controllers\Adminlte\Order\StoreController::class)->name('order.store');
    Route::get('/{order}/edit', \App\Http\Controllers\Adminlte\Order\EditController::class)->name('order.edit');
    Route::get('/{order}', \App\Http\Controllers\Adminlte\Order\ShowController::class)->name('order.show');
    Route::patch('/{order}', \App\Http\Controllers\Adminlte\Order\UpdateController::class)->name('order.update');
    Route::delete('/{order}', \App\Http\Controllers\Adminlte\Order\DeleteController::class)->name('order.delete');
});
//-------------------- END ORDERS ROUTES -----------------
Route::get('/admin', \App\Http\Controllers\Adminlte\Main\IndexController::class)->name('main.index');

//-------------------ABSOLUTE GRES-----------------------
Route::get('/absolut-gres-import-from-xml', [\App\Http\Controllers\AbsolutGresController::class, 'import_from_xml']);
Route::get('/absolut-gres-import-scrap', [\App\Http\Controllers\AbsolutGresController::class, 'import_scrap']);
Route::get('/absolut-gres', [\App\Http\Controllers\AbsolutGresController::class, 'index'])->name('absolut_gres.index');
Route::get('/absolut-gres/{id}', [\App\Http\Controllers\AbsolutGresController::class, 'show'])->name('absolut_gres.show');
//------------------END ABSOLUTE GRES-------------------

//---------------------LEDOO-CARAMELLE---------------------
Route::get('/leedo-import-ftp', [\App\Http\Controllers\LeedoController::class, 'import_from_ftp_to_database']);
Route::get('/leedo-download-img', [\App\Http\Controllers\LeedoController::class, 'download_leedo_img']);
Route::get('/leedo-index', [\App\Http\Controllers\LeedoController::class, 'index'])->name('leedo.index');
Route::get('/leedo/show/{id}', [\App\Http\Controllers\LeedoController::class, 'show'])->name('leedo.show');
//-------------------LEDOO-CARAMELLE-END-------------------

//---------------------ALTACERA---------------------
Route::get('/altacera-import-all', [\App\Http\Controllers\AltaceraImportController::class, 'altacera_import_all']);
Route::get('/altacera-index', [\App\Http\Controllers\AltaceraController::class, 'index'])->name('altacera.index');
Route::get('/altacera/{id}', [\App\Http\Controllers\AltaceraController::class, 'show'])->name('altacera.show');
Route::get('/altacera-download-img', [\App\Http\Controllers\AltaceraImportController::class, 'download_img']);
//-------------------ALTACERA-END-------------------
