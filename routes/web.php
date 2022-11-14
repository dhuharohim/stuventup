<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventDataController;
use App\Http\Controllers\EventFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile as Profile;
use Illuminate\Support\Facades\Auth;
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
    return view('dashboard.index');
})->name('landing');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//register
Route::post('/', [RegisterController::class, 'register'])->name('register.store');

//profile
Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.store');
Route::post('/crop', [ProfileController::class,'crop'])->name('update.image');
Route::post('/reset', [ProfileController::class,'resetPhoto'])->name('reset.image');


//setting
Route::get('/setting',[ProfileController::class, 'setting'])->name('setting.index');
Route::post('/setting/update/{id}', [ProfileController::class, 'updateuser'])->name('setting.store');


//event
Route::get('/event', [EventFormController::class, 'index'])->name('event.index');
Route::post('event-store', [EventFormController::class, 'store']);
Route::get('/event-data', [EventFormController::class, 'show'])->name('event.data');
Route::post('update-status', [EventFormController::class, 'updateStatus'])->name('status.update');



//magazine
Route::get('/news', [MagazineController::class, 'index'])->name('magazine.index');


