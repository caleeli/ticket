<?php

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

use App\Event;
use App\Http\Controllers\Auth\LoginOAuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    /*$events = Cache::remember('users', 60, function () {
        return Event::orderBy('start_at', 'desc')->limit(5)->get();
    });*/
    $events = Event::orderBy('start_at', 'desc')->limit(5)->get();
    $lastEvents = Event::orderBy('id', 'desc')->limit(7)->get();
    return view('welcome', compact('events', 'lastEvents'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Socialite routes
Route::get('login/{provider}', [LoginOAuthController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginOAuthController::class, 'handleProviderCallback']);

Route::get('oauth/userinfo', [LoginOAuthController::class, 'userinfo'])->middleware('auth:api');

Route::get('ticket/{event}', [TicketController::class, 'show']);
Route::get('ticket/{event}/reserva/{entrada}', [TicketController::class, 'reserva']);
Route::post('ticket/{event}/reserva/{entrada}', [TicketController::class, 'reservaPost']);
