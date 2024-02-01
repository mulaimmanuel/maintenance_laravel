<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\FormFPPController;
use App\Http\Controllers\PreventiveController;
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
    return view('welcome');
});

Route::resource('mesins', MesinController::class);
Route::resource('formperbaikans', FormFPPController::class);
Route::resource('receivedfpps', FormFPPController::class);
Route::resource('approvedfpps', FormFPPController::class);
Route::resource('preventives', PreventiveController::class);

//Preventive
Route::get('dashpreventive', [PreventiveController::class, 'maintenanceDashPreventive'])
    ->name('maintenance.dashpreventive');
Route::get('deptmtcepreventive', [PreventiveController::class, 'deptmtceDashPreventive'])
    ->name('deptmtce.dashpreventive');

//Production
Route::get('dashboardproduction', [FormFPPController::class, 'DashboardProduction'])
    ->name('fpps.index');
Route::get('formproduction', [FormFPPController::class, 'FormProduction'])
    ->name('fpps.create');
Route::get('lihatform/{formperbaikan}', [FormFPPController::class, 'LihatFPP'])
    ->name('fpps.show');
Route::get('closedform/{formperbaikan}', [FormFPPController::class, 'ClosedFormProduction'])
    ->name('fpps.closed');

//Maintenance
Route::get('dashboardmaintenance', [FormFPPController::class, 'DashboardMaintenance'])
    ->name('maintenance.index');
Route::get('lihatmaintenance/{formperbaikan}', [FormFPPController::class, 'LihatMaintenance'])
    ->name('maintenance.lihat');
Route::get('editmaintenance/{formperbaikan}', [FormFPPController::class, 'EditMaintenance'])
    ->name('maintenance.edit');
Route::get('editpreventive/{preventive}', [PreventiveController::class, 'EditMTCEPreventive'])
    ->name('maintenance.editpreventive');


//Dept Maintenance
Route::get('dashboarddeptmtce', [FormFPPController::class, 'DashboardDeptMTCE'])
    ->name('deptmtce.index');
Route::get('lihatdeptmtce/{formperbaikan}', [FormFPPController::class, 'LihatDeptMTCE'])
    ->name('deptmtce.show');
Route::get('editdeptmtcepreventive/{preventive}', [PreventiveController::class, 'EditDeptMTCEPreventive'])
    ->name('deptmtce.editpreventive');

//Sales
Route::get('dashboardfppsales', [FormFPPController::class, 'DashboardFPPSales'])
    ->name('sales.index');
Route::get('lihatfppsales/{formperbaikan}', [FormFPPController::class, 'LihatFPPSales'])
    ->name('sales.lihat');

//Download Excel
Route::get('download-excel/{formperbaikan}', [FormFPPController::class, 'downloadExcelFile'])->name('download.excel');
