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
    return view('pages.home');
});
/*testing*/
/*Route::get('/roomPage','RoomController@viewrooms');*/
Route::get('/homePage','RoomController@view');
Route::get('/roomPage', function () {
    return view('pages.roomPage');
});
Route::get('/detailRoom', function () {
    return view('pages.detailRoom');
});
Route::get('/bookingRoom','BookingFormController@viewbasic');
Route::get('/bookingRoom/{id}',array('as'=>'bookwithroom','uses'=>'BookingFormController@bookwithroom'));
Route::post('/bookroom','BookingFormController@BookRoom');
//email
Route::get('/email', function () {
    return view('send_email');
});
Route::post('/sendEmail', 'Email@sendEmail');

Route::get('/home',array('as'=>'home','uses'=>'HomepageController@viewall'));
Route::get('/home/ajax/{id}',array('as'=>'myhome.ajax','uses'=>'HomepageController@myhomeAjax'));
Route::get('/home/ajax/{id}/{floor}',array('as'=>'myroom.ajax','uses'=>'HomepageController@myroomAjax'));

//detail Booking
Route::get('/detailBooking/{id}',array('as'=>'detailBooking','uses'=>'DetailBookingController@viewbook'));
Route::post('/detailBooking/{id}',array('as'=>'cancelBooking','uses'=>'DetailBookingController@cancel'));
Route::post('/detailBooking/{id}/{pin}',array('as'=>'submitBooking','uses'=>'DetailBookingController@submit'));

