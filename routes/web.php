<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataRegistController;
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

Route::get('/register/{page}', [RegisterController::class, 'registIndex'])->name('registerIndex');
Route::post('/register/{type}', [RegisterController::class, 'registStore'])->name('register.store');



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
Route::post('upload-poster', [EventFormController::class,'uploadPoster'])->name('upload.poster');
Route::post('event-store', [EventFormController::class, 'store'])->name('event.store');
Route::get('/event-data', [EventFormController::class, 'show'])->name('event.data');
Route::post('update-status', [EventFormController::class, 'updateStatus'])->name('status.update');
Route::post('update-berlangsung', [EventFormController::class, 'updateBerlangsung'])->name('status.berlangsung');

Route::post('update-event', [EventFormController::class, 'edit'])->name('event.update');
Route::post('delete-event', [EventFormController::class, 'destroy'])->name('delete.event');

//registrasi
Route::get('/data-registrasi/{name_activity}', [DataRegistController::class, 'index'])->name('regist.index');
Route::post('/konfirmasi-pembayaran',[DataRegistController::class, 'confirmPayment']);


//magazine
Route::get('/news', [MagazineController::class, 'index'])->name('magazine.index');
Route::get('/news-detail/{name_activity}', [MagazineController::class, 'show'])->name('news.detail');
Route::post('regist-event', [DataRegistController::class, 'store'])->name('regist.event');

//ticket invoice
Route::post('/ticket-invoice', [MagazineController::class, 'invoiceTicket'])->name('ticket.invoice');
Route::get('/invoice/{name_activity}', [MagazineController::class, 'indexInvoice'])->name('invoice.index');

//styling email
Route::get('/style-email', [MagazineController::class, 'email'])->name('style.email');


