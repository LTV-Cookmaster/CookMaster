<?php

use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('room', RoomController::class)->except(['show']);
    Route::resource('user', UserController::class)->except(['show']);
    Route::resource('office', OfficeController::class)->except(['show']);
    Route::prefix('office')->name('office.')->group(function (){
        Route::get('office/list/{office}', [OfficeController::class, 'list'])->name('admin.office.list');
    });
});

Route::match(['get', 'post'], '/admin/users/{user}/unban', [UserController::class, 'unban'])->name('admin.user.unban');
Route::match(['get', 'post'], '/admin/users/{user}/ban', [UserController::class, 'ban'])->name('admin.user.ban');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('subscription/checkout/{plan}', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
Route::get('subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');


