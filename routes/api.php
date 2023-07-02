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
use Illuminate\Support\Facades\DB;
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

Route::get('/rooms/{office_id}/{start_date}/{end_date}/{start_time}/{end_time}', function ($office_id, $start_date, $end_date, $start_time, $end_time) {
    $rooms = DB::table('rooms')
        ->where('office_id', '=', $office_id)
        ->whereNotIn('id', function ($query) use ($start_date, $end_date, $start_time, $end_time) {
            $query->select('room_id')
                ->from('reservations')
                ->where('start_date', '<=', $end_date)
                ->where('end_date', '>=', $start_date)
                ->where('start_time', '<=', $end_time)
                ->where('end_time', '>=', $start_time);
        })
        ->get();
    return $rooms;
});

Route::get('/rooms/{office_id}/', function ($office_id) {
    return DB::table('rooms')
        ->where('office_id', '=', $office_id)
        ->whereNotIn('id', function ($query) use ($office_id) {
            $query->select('room_id')
                ->from('reservations');
        })
        ->get();
});

Route::get('/reservations', function () {
    return DB::table('reservations')
        ->get();
});

Route::get('/reservations/{user_id}', function ($user_id) {
    return DB::table('reservations')
        ->where('user_id', '=', $user_id)
        ->get();
});

Route::get('/recipes', function () {
    return new RecipeCollection(Recipe::all());
});
