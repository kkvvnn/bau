<?php

use App\Http\Controllers\AquaFloorController;
use App\Http\Controllers\AvitoController;
use App\Http\Controllers\KerranovaController;
use App\Http\Controllers\MyHelpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrimaveraNewController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SkallaController;
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

Route::resource('discounts', \App\Http\Controllers\DiscountController::class);

//----- BAUSERVICE -----
//Route::get('/', [ProductController::class, 'index_all'])->name('product_index');
Route::get('/', function () {
    return view('index-main');
})->name('product_index');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/laparet', [ProductController::class, 'laparet'])->name('laparet.index');
Route::get('/cersanit', [ProductController::class, 'cersanit'])->name('cersanit.index');
Route::get('/vitra', [ProductController::class, 'vitra'])->name('vitra.index');
Route::get('/ceradim', [ProductController::class, 'index_ceradim'])->name('ceradim.index');
Route::get('/ceradim-list', [ProductController::class, 'index_ceradim_table']);
Route::get('/kerama-marazzi', [ProductController::class, 'index_kerama_marazzi']);
Route::get('/kerama-marazzi-keramogranit', [ProductController::class, 'index_kerama_marazzi_keramogranit'])->name('kerama-marazzi.index');
Route::get('/kerama-marazzi/test', [ProductController::class, 'kerama_marazzi_test']);

Route::get('/bauservice-spb', [ProductController::class, 'index_spb']);

Route::get('/santech', [ProductController::class, 'index_santech'])->name('santech_index');
Route::get('/water-mixers', [ProductController::class, 'water_mixers'])->name('water_mixers.index');

Route::get('/sale', [ProductController::class, 'index_sale'])->name('product_sale');

Route::get('/collection/{name:slug}', [ProductController::class, 'collection_name']);
Route::get('/product/{slug:slug}', [ProductController::class, 'show'])->name('show');


//------------ AVITO ------------
Route::prefix('avito')
    ->name('avito.')
//    ->middleware(BasicAuthMiddleware::class)
    ->group(function () {

    Route::get('/{account}', [AvitoController::class, 'form']);
    Route::post('/main', [AvitoController::class, 'export_main']);
    Route::post('/laparet-moscow', [AvitoController::class, 'export_laparet_moscow']);
    Route::post('/laparet-kazan', [AvitoController::class, 'export_laparet_kazan']);
    Route::post('/millennium', [AvitoController::class, 'export_millennium']);

    //----- AVITO LAPARET-MOSCOW OLD TOVARS (Import via form) -----
    Route::view('/laparet-moscow/import-old-ads', 'exports.avito.old-laparet-moscow');
    Route::post('/laparet-moscow/import-old-ads', [AvitoController::class, 'import_old_ads'])->name('laparet-moscow-old');
});



//----- CREATE_WOOCOMMERCE_FILE  -----
Route::get('/woocommerce/export', [\App\Http\Controllers\WoocommerceController::class, 'export'])->name('woocommerce.export');

//----- CREATE_INSALES_FILE  -----
Route::get('/insales/export/laparet/carving', [\App\Http\Controllers\InsalesController::class, 'export_laparet_carving'])->name('insales.export.laparet.carving');
Route::get('/insales/export/laparet/wood', [\App\Http\Controllers\InsalesController::class, 'export_laparet_wood'])->name('insales.export.laparet.wood');

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
Route::get('/in-kazan', [MyHelpController::class, 'not_in_moscow']);
//Route::get('/laparet/{size?}', [MyHelpController::class, 'laparet']);
Route::get('/bauservice/{brand}/{size}/{surface}/{count?}', [MyHelpController::class, 'laparet']);
Route::get('/bauservice/filter-2', [MyHelpController::class, 'laparet_filter'])->name('keramogranit.filter');
Route::get('/bauservice/filter', [MyHelpController::class, 'keramogranit_filter'])->name('bauservice.filter');
Route::get('/images-text', [MyHelpController::class, 'image_text']);
Route::view('/text', 'av');

Route::get('/avito-napolnye-resheniya-laparet', [MyHelpController::class, 'avito_napolnye_resheniya_laparet']);
Route::get('/avito-laparet-moscow', [MyHelpController::class, 'avito_laparet_zapad']);

Route::get('/avito-laparet-kazan', [MyHelpController::class, 'avito_laparet_kazan']);

//----- SEARCH_CONTROLLER -----
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

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


//----- NTCERAMIC (Import from fixed .xlsx) -----
Route::get('/ntceramic/import', [\App\Http\Controllers\NtCeramicController::class, 'import']);
Route::get('/ntceramic', [\App\Http\Controllers\NtCeramicController::class, 'index'])->name('ntceramic.index');
Route::get('/ntceramic/{id}', [\App\Http\Controllers\NtCeramicController::class, 'show'])->name('ntceramic.show');

//----- KEVIS (Import from fixed .xlsx) -----
//Route::get('/kevis/import', [\App\Http\Controllers\KevisController::class, 'import']);
//Route::get('/kevis', [\App\Http\Controllers\KevisController::class, 'index'])->name('kevis.index');
//Route::get('/kevis/{id}', [\App\Http\Controllers\KevisController::class, 'show'])->name('kevis.show');

Route::get('/kevis/import', [\App\Http\Controllers\NewKevisController::class, 'import']);
Route::get('/kevis', [\App\Http\Controllers\NewKevisController::class, 'index'])->name('kevis.index');
Route::get('/kevis/{slug:slug}', [\App\Http\Controllers\NewKevisController::class, 'show'])->name('kevis.show');
Route::get('/kevis/collection/{name}', [\App\Http\Controllers\NewKevisController::class, 'collection'])->name('kevis.collection');


//----- TECHNOTILE (Import from auto-updated .xml) -----
Route::get('/technotile/import', [\App\Http\Controllers\TechnotileController::class, 'import']);
Route::get('/technotile/index', [\App\Http\Controllers\TechnotileController::class, 'index'])->name('technotile.index');
Route::get('/technotile/{id}', [\App\Http\Controllers\TechnotileController::class, 'show'])->name('technotile.show');

//----- KERAMOPRO (Import from auto-updated .xml) -----
Route::get('/keramopro', [\App\Http\Controllers\KeramoproController::class, 'index'])->name('keramopro.index');
Route::get('/keramopro/{slug:slug}', [\App\Http\Controllers\KeramoproController::class, 'show'])->name('keramopro.show');
Route::get('/keramopro/collection/{name}', [\App\Http\Controllers\KeramoproController::class, 'collection'])->name('keramopro.collection');

//----- EMPERO (Import from scrap .xlsx via form) -----
Route::view('/empero/import', 'empero.import');
Route::post('/empero/import-work', [\App\Http\Controllers\EmperoController::class, 'import_work'])->name('empero.import-work');
Route::get('/empero/index', [\App\Http\Controllers\EmperoController::class, 'index'])->name('empero.index');
Route::get('/empero/{id}', [\App\Http\Controllers\EmperoController::class, 'show'])->name('empero.show');

//----- PIXMOSAIC NEW (Import from scrap .xlsx via form) -----
Route::view('/pixmosaic/import', 'pixmosaic-new.import');
Route::post('/pixmosaic/import', [\App\Http\Controllers\PixmosaicNewController::class, 'import'])->name('pixmosaic-new.import');
Route::get('/pixmosaic', [\App\Http\Controllers\PixmosaicNewController::class, 'index'])->name('pixmosaic-new.index');
Route::get('/pixmosaic/{slug:slug}', [\App\Http\Controllers\PixmosaicNewController::class, 'show'])->name('pixmosaic-new.show');
Route::get('/pixmosaic/collection/{name}', [\App\Http\Controllers\PixmosaicNewController::class, 'collection'])->name('pixmosaic-new.collection');

//----- PIXMOSAIC VIDEO YOUTUBE -----
Route::get('/pixmosaic/video/import', [\App\Http\Controllers\PixmosaicVideoController::class, 'import']);

//----- GLOBAL-TILE (Import from .xls via form) -----
Route::view('/global-tile/import', 'global-tile.import');
Route::post('/global-tile/import', [\App\Http\Controllers\GlobalTileController::class, 'import'])->name('global-tile.import');
Route::get('/global-tile', [\App\Http\Controllers\GlobalTileController::class, 'index'])->name('global-tile.index');
Route::get('/global-tile/{slug:slug}', [\App\Http\Controllers\GlobalTileController::class, 'show'])->name('global-tile.show');
Route::get('/global-tile/collection/{name}', [\App\Http\Controllers\GlobalTileController::class, 'collection'])->name('global-tile.collection');

//----- PRIMAVERA -----
Route::name('primavera-new.')->group(function () {
    //----- PRIMAVERA-NEW (Import from .xls via form) -----
    Route::controller(PrimaveraNewController::class)->group(function () {
        Route::view('/primavera/import', 'primavera-new.import');
        Route::post('/primavera/import', 'import')->name('import');
        Route::get('/primavera', 'index')->name('index');
        Route::get('/primavera/{slug:slug}', 'show')->name('show');
        Route::get('/primavera/collection/{name}', 'collection')->name('collection');
    });

    //----- PRIMAVERA-PRICE-LIST (Import from .xls via form) -----
    Route::view('/primavera-price-list-import', 'primavera-new.import-price-list');
    Route::post('/primavera-price-list-import', [\App\Http\Controllers\PrimaveraPriceListController::class, 'import_price_list'])->name('import-price-list');

    //----- PRIMAVERA-STOCKS (Import from .xls via form) -----
    Route::view('/primavera-stocks-import', 'primavera-new.import-stocks');
    Route::post('/primavera-stocks-import', [\App\Http\Controllers\PrimaveraNewStockController::class, 'import'])->name('import-stocks');
});

//----- KERRANOVA -----
Route::name('kerranova.')->group(function () {
    Route::controller(KerranovaController::class)->group(function () {
        Route::view('/kerranova/import', 'kerranova.import');
        Route::post('/kerranova/import-work', 'import_work')->name('import-work');
        Route::get('/kerranova', 'index')->name('index');
        Route::get('/kerranova/{slug:slug}', 'show')->name('show');
        Route::get('/kerranova/collection/{name}', 'collection')->name('collection');
    });

    //----- KERRANOVA-PRICE-LIST-AND-STOCKS (Import from .xls via form) -----
    Route::view('/kerranova-price-stock-import', 'kerranova.import-price-stock');
    Route::post('/kerranova-import-work-price-stock', [KerranovaController::class, 'import_work_price_stock'])->name('import-work-price-stock');
});

//----- AZARIO -----
Route::name('azario.')->group(function (){
    Route::controller(\App\Http\Controllers\AzarioController::class)->group(function () {
        Route::view('/azario/import', 'azario.import');
        Route::post('/azario/import', 'import')->name('import');
        Route::get('/azario', 'index')->name('index');
        Route::get('/azario/{slug:slug}', 'show')->name('show');
        Route::get('/azario/collection/{name}', 'collection')->name('collection');
    });

    //----- AZARIO-PRICE-LIST-AND-STOCKS (Import from .csv via form) -----
    Route::view('/azario-price-stock-import', 'azario.import-price-stock');
    Route::post('/azario-price-stock-import', [\App\Http\Controllers\AzarioController::class, 'import_price_stock'])->name('import-price-stock');
});

//----- SKALLA -----
Route::name('skalla.')->group(function () {
    Route::controller(SkallaController::class)->group(function () {
        Route::view('/skalla/import', 'skalla.import');
        Route::post('/skalla/import', 'import');
        Route::get('/skalla', 'index')->name('index');
        Route::get('/skalla/{slug:slug}', 'show')->name('show');
        Route::get('/skalla/collection/{name:slug}', 'collection')->name('collection');

        Route::view('/skalla-price-list-import', 'skalla.import-price-list');
        Route::post('/skalla-price-list-import', 'price_list');
    });
});


//----- CARVING -----
Route::get('/carving', [\App\Http\Controllers\CarvingController::class, 'index'])->name('carving.index');

//----- QR-CODE -----
Route::get('/generate-qrcode', [QrCodeController::class, 'index']);

//----- KERABELLEZZA -----
Route::get('/kerabellezza-import', [\App\Http\Controllers\KerabellezzaController::class, 'import']);
Route::get('/kerabellezza-import-2', [\App\Http\Controllers\KerabellezzaController::class, 'import2']);
Route::get('/kerabellezza', [\App\Http\Controllers\KerabellezzaController::class, 'index'])->name('kerabellezza.index');
Route::get('/kerabellezza/{id}', [\App\Http\Controllers\KerabellezzaController::class, 'show']);


//Route::view('/contacts', 'contacts');


//----- ARTKERA-NEW -----
Route::get('/artkera', [\App\Http\Controllers\ArtkeraController::class, 'index'])->name('artkera.index');
Route::get('/artkera/{slug:slug}', [\App\Http\Controllers\ArtkeraController::class, 'show'])->name('artkera.show');
Route::get('/artkera/collection/{name}', [\App\Http\Controllers\ArtkeraController::class, 'collection'])->name('artkera.collection');


//----- LEEDO-CARAMELLE (Import from auto-updated .json) -----
Route::get('/leedo', [\App\Http\Controllers\LeedoController::class, 'index'])->name('leedo.index');
Route::get('/leedo/{slug:slug}', [\App\Http\Controllers\LeedoController::class, 'show'])->name('leedo.show');
Route::get('/leedo/collection/{name}', [\App\Http\Controllers\LeedoController::class, 'collection'])->name('leedo.collection');


//----- RUSPLITKA (Import from auto-updated .xml) -----
Route::get('/rusplitka', [\App\Http\Controllers\RusplitkaController::class, 'index'])->name('rusplitka.index');
Route::get('/rusplitka/{slug:slug}', [\App\Http\Controllers\RusplitkaController::class, 'show'])->name('rusplitka.show');
Route::get('/rusplitka/collection/{name}', [\App\Http\Controllers\RusplitkaController::class, 'collection'])->name('rusplitka.collection');

Route::get('/rusplitka-names', [\App\Http\Controllers\RusplitkaController::class, 'names']);


//----- ARTCENTER -----
Route::get('/artcenter/brand/{brand}', [\App\Http\Controllers\ArtcenterController::class, 'artcenter'])->name('artcenter.index');
Route::get('/artcenter/{slug:slug}', [\App\Http\Controllers\ArtcenterController::class, 'show'])->name('artcenter.show');
Route::get('/artcenter/collection/{name}/{brand}', [\App\Http\Controllers\ArtcenterController::class, 'collection'])->name('artcenter.collection');

Route::view('/grafik-new-year-2025', 'new-year');

Route::view('/save-media', 'storage.form');
Route::post('/save-media', [\App\Http\Controllers\StorageController::class, 'store']);
