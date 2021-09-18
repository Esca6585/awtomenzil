<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CrudDriverController;
use App\Http\Controllers\Admin\CrudCarController;
use App\Http\Controllers\Admin\CrudAutoColumnController;
use App\Http\Controllers\Admin\CrudUserController;
use App\Http\Controllers\Admin\CrudJobController;
use App\Http\Controllers\Admin\CrudSectionController;
use App\Http\Controllers\Admin\CrudSectionJobController;
use App\Http\Controllers\Admin\ExcelExportController;

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

Route::get('/', function(){
    return redirect()->route('admin.dashboard');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::name('admin.')->group(function(){
        Route::resource('/sections', CrudSectionController::class);
        Route::resource('/jobs', CrudJobController::class);
        Route::resource('/sectionsjobs', CrudSectionJobController::class);
        Route::resource('/drivers', CrudDriverController::class);
        Route::resource('/cars', CrudCarController::class);
        Route::resource('/autocolumn', CrudAutoColumnController::class);
        Route::resource('/users', CrudUserController::class);
        Route::get('autocolumn/excel/export', [ExcelExportController::class, 'autocolumnExcel']);
        Route::get('drivers/excel/export', [ExcelExportController::class, 'driversExcel']);
    });
});

Auth::routes([
    'register' => false, // Routes of Registration
    'reset' => false,    // Routes of Password Reset
    'verify' => false,   // Routes of Email Verification
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
