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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::group(array('prefix' => 'flights'), function() {
    Route::get('/', 'flightsController@index');
    Route::get('/add-flights', 'flightsController@add');
    Route::post('/add-flights-post', 'flightsController@addPost');
    Route::get('/delete-flights/{id}', 'flightsController@delete');
    Route::get('/edit-flights/{id}', 'flightsController@edit');
    Route::post('/edit-flights-post', 'flightsController@editPost');
    Route::get('/change-status-flights/{id}', 'flightsController@changeStatus');
    Route::get('/view-flights/{id}', 'flightsController@view');
});
// end of flights routes
// routes for flight_reviews.
Route::group(array('prefix' => 'flight_reviews'), function() {
    Route::get('/', 'FlightReviewsController@index');
    Route::get('/add-flight_reviews', 'FlightReviewsController@add');
    Route::post('/add-flight_reviews-post', 'FlightReviewsController@addPost');
    Route::get('/delete-flight_reviews/{id}', 'FlightReviewsController@delete');
    Route::get('/edit-flight_reviews/{id}', 'FlightReviewsController@edit');
    Route::post('/edit-flight_reviews-post', 'FlightReviewsController@editPost');
    Route::get('/change-status-flight_reviews/{id}', 'FlightReviewsController@changeStatus');
    Route::get('/view-flight_reviews/{id}', 'FlightReviewsController@view');
});
// end of flight_reviews routes
// routes for flight_bookings.
Route::group(array('prefix' => 'flight_bookings'), function() {
    Route::get('/', 'FlightBookingsController@index');
    Route::get('/add-flight_bookings', 'FlightBookingsController@add');
    Route::post('/add-flight_bookings-post', 'FlightBookingsController@addPost');
    Route::get('/delete-flight_bookings/{id}', 'FlightBookingsController@delete');
    Route::get('/edit-flight_bookings/{id}', 'FlightBookingsController@edit');
    Route::post('/edit-flight_bookings-post', 'FlightBookingsController@editPost');
    Route::get('/change-status-flight_bookings/{id}', 'FlightBookingsController@changeStatus');
    Route::get('/view-flight_bookings/{id}', 'FlightBookingsController@view');
}); // routes for users.
Route::group(array('prefix' => 'users'), function() {
    Route::get('/', 'UserController@index');
    Route::get('/add-users', 'UserController@add');
    Route::post('/add-users-post', 'UserController@addPost');
    Route::get('/delete-users/{id}', 'UserController@delete');
    Route::get('/edit-users/{id}', 'UserController@edit');
    Route::post('/edit-users-post', 'UserController@editPost');
    Route::get('/change-status-users/{id}', 'UserController@changeStatus');
    Route::get('/view-users/{id}', 'UserController@view');
});
// end of users routes
// routes for ticket_classs.
Route::group(array('prefix' => 'ticket_classs'), function() {
    Route::get('/', 'TicketClassController@index');
    Route::get('/add-ticket_classs', 'TicketClassController@add');
    Route::post('/add-ticket_classs-post', 'TicketClassController@addPost');
    Route::get('/delete-ticket_classs/{id}', 'TicketClassController@delete');
    Route::get('/edit-ticket_classs/{id}', 'TicketClassController@edit');
    Route::post('/edit-ticket_classs-post', 'TicketClassController@editPost');
    Route::get('/change-status-ticket_classs/{id}', 'TicketClassController@changeStatus');
    Route::get('/view-ticket_classs/{id}', 'TicketClassController@view');
});
// end of ticket_classs routes
