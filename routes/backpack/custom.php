<?php
use \ExportImport\Mypakage\Http\Controllers\Admin\ImportpageController; 
use \ExportImport\Mypakage\Http\Controllers\Admin\ExportpageController; 
/*
|--------------------------------------------------------------------------
| ExportImport\Mypakage Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the ExportImport\Mypakage package.
|
*/

/**
 * User Routes
 */

// Route::group([
//     'middleware'=> array_merge(
//     	(array) config('backpack.base.web_middleware', 'web'),
//     ),
// ], function() {
//     Route::get('something/action', \ExportImport\Mypakage\Http\Controllers\SomethingController::actionName());
// });


/**
 * Admin Routes
 */

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        'web',
         
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
        'admin',
        InitializeTenancyByDomain::class,
       
    ],
], function () {
  
Route::get('importpage', 'ImportpageController@index')->name('page.importpage.index');
Route::POST('/importpage', [ImportpageController::class, 'showImportForm'])->name('import');

Route::POST('exportpage',[ExportpageController::class, 'export'])->name('export');
Route::get('exportpage', 'ExportpageController@index')->name('page.exportpage.index');

});












