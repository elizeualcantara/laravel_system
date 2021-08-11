<?php

use App\Http\Controllers\WorkHoursController;
use App\Http\Controllers\ProvidersController;
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

Route::get('/employees', [WorkHoursController::class, 'indexFiltering'])->name('employees.indexFiltering')->middleware('auth');
Route::get('/employees/create', [WorkHoursController::class, 'create'])->name('employees.create');
Route::get('/employees/create/{id}', [WorkHoursController::class, 'createProvider'])->name('employees.createProvider');
Route::post('/employees', [WorkHoursController::class, 'store'])->name('employees.store');
Route::get('/employees/hours', [WorkHoursController::class, 'indexAllHours'])->name('employees.indexTotalHours')->middleware('auth');
Route::delete('/employees/{id}', [WorkHoursController::class, 'destroy'])->name('employees.destroy')->middleware('auth');
Route::get('/employees/hours/{period}', [WorkHoursController::class, 'showPeriodHours'])->name('employees.showHoursPerPeriod')->middleware('auth');
Route::get('/employee-hours/{id}', [WorkHoursController::class, 'showAllFromEmployee'])->name('employees.showAllOfEmployee')->middleware('auth');

Route::get('/providers', [ProvidersController::class, 'indexFiltering'])->name('providers.indexFiltering')->middleware('auth');
Route::get('/providers/create', [ProvidersController::class, 'create'])->name('providers.create');
Route::post('/providers', [ProvidersController::class, 'store'])->name('providers.store');
Route::get('/providers/{id}', [ProvidersController::class, 'show'])->name('providers.show')->middleware('auth');
Route::delete('/providers/{id}', [ProvidersController::class, 'destroy'])->name('providers.destroy')->middleware('auth');

Route::get('/pdf/{id}', [WorkHoursController::class, 'createPDF'])->middleware('auth');
Route::get('/reports', [ProvidersController::class, 'indexReports'])->name('providers.indexReports')->middleware('auth');

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');