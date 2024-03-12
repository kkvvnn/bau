<?php

use App\Http\Controllers\AquaFloorController;
use App\Http\Controllers\AvitoController;
use App\Http\Controllers\AvitoSpbController;
use App\Http\Controllers\AvitoTwoController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyHelpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TelegramSendController;
use App\Http\Controllers\BauserviceSpbController;
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

//----- IMPORT-FROM-BAUSERVICE-TO-DATABASE ------
Route::get('/import_product_from_csv', [ProductController::class, 'import'])->name('import_product_from_csv');
Route::get('/import_collection_from_csv', [CollectionController::class, 'import'])->name('import_collection_from_csv');
Route::get('/many', [Controller::class, 'many'])->name('many');
Route::get('/download_all_collections', [CollectionController::class, 'download_all_collections'])->name('download_all_collections');
Route::get('/download_all/{pic?}', [ProductController::class, 'download_all'])->name('download_all');

//----- BAUSERVICE -----
Route::get('/', [ProductController::class, 'index_all'])->name('product_index');
Route::get('/santech', [ProductController::class, 'index_santech'])->name('santech_index');
Route::get('/min/{count?}', [ProductController::class, 'index_min'])->name('product_min');
Route::get('/sale', [ProductController::class, 'index_sale'])->name('product_sale');
Route::get('/vivod', [ProductController::class, 'index_vivod'])->name('product_vivod');
Route::get('/no-vivod', [ProductController::class, 'index_no_vivod'])->name('product_no_vivod');
Route::get('/keramogranit_index', [ProductController::class, 'index_keramogranit'])->name('index_keramogranit');
Route::get('/plitka_index', [ProductController::class, 'index_plitka'])->name('index_plitka');
Route::get('/mosaic_index', [ProductController::class, 'index_mosaic'])->name('index_mosaic');
Route::get('/decor_index', [ProductController::class, 'index_decor'])->name('index_decor');
//Route::get('/search', [ProductController::class, 'search']);
Route::get('/size', [ProductController::class, 'index_size'])->name('index_size');
Route::view('/size_form', 'size_form')->name('index_size_form');
Route::get('/collection/{name}', [ProductController::class, 'collection_name']);
Route::get('/product/{id?}', [ProductController::class, 'show'])->name('show');
Route::get('/ddooww/{id?}', [Controller::class, 'down'])->name('img_url');
Route::get('/index/{id?}', [Controller::class, 'index2']);
Route::get('/index_collection', [CollectionController::class, 'index'])->name('index_collection');
Route::get('/index_ker/{price?}/{count?}', [ProductController::class, 'index_ker'])->name('index_ker');
Route::get('/index_plit/{price?}/{count?}', [ProductController::class, 'index_plit'])->name('index_plit');

//----- BAUSERVICE-SPB -----
Route::get('/bauservice-spb', [BauserviceSpbController::class, 'index'])->name('bauservice-spb.index');

//----- CREATE_AVITO_FILE -----
Route::get('/avito_export/{foto?}', [AvitoController::class, 'export'])->name('avito-export');
Route::get('/avito_export_two/{foto?}', [AvitoTwoController::class, 'export'])->name('avito-export-two');
Route::view('/avito', 'exports.autoload-form');
Route::view('/avito-two', 'exports.autoload-two-form');

//----- CREATE_AVITO_FILE  SPB  -----
Route::view('/avito-spb', 'exports.autoload-spb-form');
Route::get('/avito_export_spb/{foto?}', [AvitoSpbController::class, 'export'])->name('avito-export-spb');

//----- TELEGRAM -----
Route::get('/telegram/skip/{skip}/send/{count}', [TelegramSendController::class, 'send'])->name('send_to_telegram');

//----- AQUAFLOOR ------
Route::get('/aquafloor/import', [AquaFloorController::class, 'import'])->name('aqua_flor_import');
Route::get('/aquafloor/download_pic', [AquaFloorController::class, 'download_pic']);
Route::get('/aquafloor/index', [AquaFloorController::class, 'index'])->name('aquafloor_index');
Route::get('/aquafloor/{id}', [AquaFloorController::class, 'show'])->name('aquafloor.show');
Route::get('/aquafloor/collection/{name}', [AquaFloorController::class, 'show_collection'])->name('aquafloor.show.collection');

//----- HELP_CONTROLLER -----
Route::get('/list-all', [MyHelpController::class, 'list']);
Route::get('/export/nt-primavera-rusplitka', [MyHelpController::class, 'nt_prim_ruspl']);
Route::get('/laparet-price-list-60x60-60x120', [MyHelpController::class, 'price_list_60x60_60x120']);
Route::get('/vitra-count', [MyHelpController::class, 'vitra_count']);
Route::get('/biggest', [MyHelpController::class, 'biggest']);
Route::get('/derevo', [MyHelpController::class, 'derevo']);
Route::get('/count-product-with-foto', [MyHelpController::class, 'count_product_with_foto']);
Route::get('/not-found-rezults', [MyHelpController::class, 'not_found_rezults']);
Route::get('/calacatta-all', [MyHelpController::class, 'calacatta_all']);
Route::get('/leedo-all', [MyHelpController::class, 'leedo_all']);

//----- SEARCH_CONTROLLER -----
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

//----- PRIMAVERA -----
Route::get('/primavera/import', [\App\Http\Controllers\PrimaveraController::class, 'import']);
Route::get('/primavera', [\App\Http\Controllers\PrimaveraController::class, 'index'])->name('primavera.index');
Route::get('/primavera/download-pic', [\App\Http\Controllers\PrimaveraController::class, 'download_pic']);
Route::get('/primavera/{id}', [\App\Http\Controllers\PrimaveraController::class, 'show'])->name('primavera.show');
Route::get('/primavera-search', [\App\Http\Controllers\PrimaveraController::class, 'search'])->name('primavera.search');
Route::view('/primavera-search-form','primavera.search')->name('primavera.search.form');

//----- PHOTO -----
Route::any('photo', [\App\Http\Controllers\PhotoController::class, 'store'])->name('save-foto');
Route::any('photo-primavera', [\App\Http\Controllers\PhotoController::class, 'store_primavera'])->name('save-foto-primavera');
Route::any('photo-ntceramic', [\App\Http\Controllers\PhotoController::class, 'store_ntceramic'])->name('save-foto-ntceramic');
Route::any('photo-pixmosaic', [\App\Http\Controllers\PhotoController::class, 'store_pixmosaic'])->name('save-foto-pixmosaic');
Route::any('photo-absolut_gres', [\App\Http\Controllers\PhotoController::class, 'store_absolut_gres'])->name('save-foto-absolut_gres');
Route::any('photo-leedo', [\App\Http\Controllers\PhotoController::class, 'store_leedo'])->name('save-foto-leedo');
Route::any('photo-altacera', [\App\Http\Controllers\PhotoController::class, 'store_altacera'])->name('save-foto-altacera');
Route::any('photo-delete', [\App\Http\Controllers\PhotoController::class, 'delete'])->name('photo.delete');
Route::any('photo-delete-primavera', [\App\Http\Controllers\PhotoController::class, 'delete_primavera'])->name('photo-primavera.delete');
Route::any('photo-delete-ntceramic', [\App\Http\Controllers\PhotoController::class, 'delete_ntceramic'])->name('photo-ntceramic.delete');
Route::any('photo-delete-pixmosaic', [\App\Http\Controllers\PhotoController::class, 'delete_pixmosaic'])->name('photo-pixmosaic.delete');
Route::any('photo-delete-absolut_gres', [\App\Http\Controllers\PhotoController::class, 'delete_absolut_gres'])->name('photo-absolut_gres.delete');
Route::any('photo-delete-leedo', [\App\Http\Controllers\PhotoController::class, 'delete_leedo'])->name('photo-leedo.delete');
Route::any('photo-delete-altacera', [\App\Http\Controllers\PhotoController::class, 'delete_altacera'])->name('photo-altacera.delete');

//----- ORDERS ROUTES -----
Route::group(['prefix' => 'admin/orders'], function () {
    Route::get('/', \App\Http\Controllers\Adminlte\Order\IndexController::class)->name('order.index');
    Route::get('/create', \App\Http\Controllers\Adminlte\Order\CreateController::class)->name('order.create');
    Route::post('/', \App\Http\Controllers\Adminlte\Order\StoreController::class)->name('order.store');
    Route::get('/{order}/edit', \App\Http\Controllers\Adminlte\Order\EditController::class)->name('order.edit');
    Route::get('/{order}', \App\Http\Controllers\Adminlte\Order\ShowController::class)->name('order.show');
    Route::patch('/{order}', \App\Http\Controllers\Adminlte\Order\UpdateController::class)->name('order.update');
    Route::delete('/{order}', \App\Http\Controllers\Adminlte\Order\DeleteController::class)->name('order.delete');
});
Route::get('/admin', \App\Http\Controllers\Adminlte\Main\IndexController::class)->name('main.index');

//----- ABSOLUTE-GRES (Import from auto-updated .xml) -----
Route::get('/absolut-gres-import-from-xml', [\App\Http\Controllers\AbsolutGresController::class, 'import_from_xml']);
Route::get('/absolut-gres-import-scrap', [\App\Http\Controllers\AbsolutGresController::class, 'import_scrap']);
Route::get('/absolut-gres', [\App\Http\Controllers\AbsolutGresController::class, 'index'])->name('absolut_gres.index');
Route::get('/absolut-gres/{id}', [\App\Http\Controllers\AbsolutGresController::class, 'show'])->name('absolut_gres.show');

//----- LEEDO-CARAMELLE (Import from auto-updated .json) -----
Route::get('/leedo-import-ftp', [\App\Http\Controllers\LeedoController::class, 'import_from_ftp_to_database']);
Route::get('/leedo-download-img', [\App\Http\Controllers\LeedoController::class, 'download_leedo_img']);
Route::get('/leedo-index', [\App\Http\Controllers\LeedoController::class, 'index'])->name('leedo.index');
Route::get('/leedo/show/{id}', [\App\Http\Controllers\LeedoController::class, 'show'])->name('leedo.show');

//----- ALTACERA (Import from auto-updated .json) -----
Route::get('/altacera-import-all', [\App\Http\Controllers\AltaceraImportController::class, 'altacera_import_all']);
Route::get('/altacera-index', [\App\Http\Controllers\AltaceraController::class, 'index'])->name('altacera.index');
Route::get('/altacera/{id}', [\App\Http\Controllers\AltaceraController::class, 'show'])->name('altacera.show');
Route::get('/altacera-download-img', [\App\Http\Controllers\AltaceraImportController::class, 'download_img']);

//----- PIXMOSAIC -----
Route::get('/pixmosaic/import', [\App\Http\Controllers\PixmosaicController::class, 'import']);
Route::get('/pixmosaic', [\App\Http\Controllers\PixmosaicController::class, 'index'])->name('pixmosaic.index');
Route::get('/pixmosaic/{id}', [\App\Http\Controllers\PixmosaicController::class, 'show'])->name('pixmosaic.show');

//----- NTCERAMIC (Import from fixed .xlsx) -----
Route::get('/ntceramic/import', [\App\Http\Controllers\NtCeramicController::class, 'import']);
Route::get('/ntceramic', [\App\Http\Controllers\NtCeramicController::class, 'index'])->name('ntceramic.index');
Route::get('/ntceramic/{id}', [\App\Http\Controllers\NtCeramicController::class, 'show'])->name('ntceramic.show');

//----- KEVIS (Import from fixed .xlsx) -----
Route::get('/kevis/import', [\App\Http\Controllers\KevisController::class, 'import']);
Route::get('/kevis', [\App\Http\Controllers\KevisController::class, 'index'])->name('kevis.index');
Route::get('/kevis/{id}', [\App\Http\Controllers\KevisController::class, 'show'])->name('kevis.show');

//----- RUSPLITKA (Import from auto-updated .xml) -----
Route::get('/rusplitka/import', [\App\Http\Controllers\RusplitkaController::class, 'import']);
Route::get('/rusplitka/test', [\App\Http\Controllers\RusplitkaController::class, 'test']);
Route::get('/rusplitka', [\App\Http\Controllers\RusplitkaController::class, 'index'])->name('rusplitka.index');
Route::get('/rusplitka/{id}', [\App\Http\Controllers\RusplitkaController::class, 'show'])->name('rusplitka.show');
Route::get('/rusplitka/export/excel', [\App\Http\Controllers\RusplitkaController::class, 'export'])->name('rusplitka.export');

//----- TECHNOTILE (Import from auto-updated .xml) -----
Route::get('/technotile/import', [\App\Http\Controllers\TechnotileController::class, 'import']);
Route::get('/technotile/index', [\App\Http\Controllers\TechnotileController::class, 'index'])->name('technotile.index');
Route::get('/technotile/{id}', [\App\Http\Controllers\TechnotileController::class, 'show'])->name('technotile.show');

//----- EMPERO (Import from scrap .xlsx via form) -----
Route::view('/empero/import', 'empero.import');
Route::post('/empero/import-work', [\App\Http\Controllers\EmperoController::class, 'import_work'])->name('empero.import-work');
Route::get('/empero/index', [\App\Http\Controllers\EmperoController::class, 'index'])->name('empero.index');
Route::get('/empero/{id}', [\App\Http\Controllers\EmperoController::class, 'show'])->name('empero.show');

//----- PIXMOSAIC NEW (Import from scrap .xlsx via form) -----
Route::view('/pixmosaic-new/import', 'pixmosaic-new.import');
Route::post('/pixmosaic-new/import-work', [\App\Http\Controllers\PixmosaicNewController::class, 'import_work'])->name('pixmosaic-new.import-work');
Route::get('/pixmosaic-new/index', [\App\Http\Controllers\PixmosaicNewController::class, 'index'])->name('pixmosaic-new.index');
Route::get('/pixmosaic-new/{id}', [\App\Http\Controllers\PixmosaicNewController::class, 'show'])->name('pixmosaic-new.show');

//----- PIXMOSAIC VIDEO YOUTUBE -----
Route::get('/pixmosaic/video/import', [\App\Http\Controllers\PixmosaicVideoController::class, 'import']);

//----- AVITO 2 OLD TOVARS (Import via form) -----
Route::view('/avito-two-old/import', 'avito-2-old.import');
Route::post('/avito-two-old-excel-import', [\App\Http\Controllers\AvitoTwoExcelController::class, 'import'])->name('avito-2-old');

//----- CARVING -----
Route::get('/carving', [\App\Http\Controllers\CarvingController::class, 'index'])->name('carving.index');
