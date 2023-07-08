<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Resources\ContractorCollection;
use App\Http\Resources\ContractorResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\QuotationCollection;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\WorkshopCollection;
use App\Models\Contractor;
use App\Models\Event;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\Recipe;
use App\Models\Reservation;
use App\Models\Subscription;
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
    return UserResource::collection(User::all());
});

Route::get('/contractors', function () {
    return ContractorResource::collection(Contractor::all());
});

Route::get('/events', function () {
    $events = Event::all();

    return response()->json(['events' => $events]);
});

Route::get('/reservations', function () {
    return ReservationResource::collection(Reservation::all());
});

// Route::get('/reservations/{user_id}', function ($user_id) {
//     return ReservationResource::collection(Reservation::where('user_id', '=', $user_id)->get());
// });

Route::get('/subscriptions', function () {
    return SubscriptionResource::collection(Subscription::all());
});

Route::get('/subscriptions/{plan}', function ($plan) {
    return SubscriptionResource::collection(Subscription::where('subscription_type', '=', $plan)->get());
});

Route::get('/subscriptions/{user_id}', function ($user_id) {
    return SubscriptionResource::collection(Subscription::where('user_id', '=', $user_id)->get());
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

Route::get('/reservations/{user_id}', function ($user_id) {
    return DB::table('reservations')
        ->where('user_id', '=', $user_id)
        ->get();
});

Route::get('/reservation/{user_id}', function ($user_id) {
    $reservations = DB::table('reservations')
        ->where('user_id', '=', $user_id)
        ->get();

    $events = [];
    $i = 0;
    foreach ($reservations as $reservation) {
        $reservationEvents = DB::table('events')
            ->where('id', $reservation->event_id)
            ->get();
        $events[$i] = $reservationEvents;
        $i++;
    }
    $nombre = count($events);
    return response()->json(['nombre' => $nombre , 'events' => $events, ]);
});

