<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Resources\ContractorCollection;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\QuotationCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\WorkshopCollection;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/users', [UserController::class , 'apiIndex']);
Route::get('/users', function () {
    return new UserCollection(User::all());
});

Route::get('/contractors', function () {
    return new ContractorCollection(User::all());
});

Route::get('/workshops', function () {
    return new WorkshopCollection(Workshop::all());
});

Route::get('/invoices', function () {
    return new InvoiceCollection(Invoice::all());
});

Route::get('/quotations', function () {
    return new QuotationCollection(Quotation::all());
});

