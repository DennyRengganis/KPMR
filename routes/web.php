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
/*testing*/
/*Route::get('/roomPage','RoomController@viewrooms');*/
Route::get('/homePage','RoomController@view');
Route::get('/roomPage', function () {
    return view('pages.roomPage');
});
Route::get('/detailRoom', function () {
    return view('pages.detailRoom');
});

Route::get('/detailRoom/{id}', array('as'=>'detailRoom','uses'=>'DetailBookingController@viewbook'));
Route::get('/detailRoom2/{id}', array('as'=>'detailRoom','uses'=>'DetailBookingController@viewbook2'));


Route::get('/bookingRoom','BookingFormController@viewbasic');
Route::get('/bookingRoom/{id}',array('as'=>'bookwithroom','uses'=>'BookingFormController@bookwithroom'));
Route::post('/bookroom','BookingFormController@BookRoom');
Route::get('/bookingRoom/{id}/{flag}',array('as'=>'bookwithroomdetail','uses'=>'BookingFormController@bookwithroomdetail'));
//email
Route::get('/email', function () {
    return view('send_email');
});
Route::post('/sendEmail', 'Email@sendEmail');

Route::get('/',array('as'=>'home','uses'=>'HomepageController@viewall'));
Route::get('/home/ajax/{id}',array('as'=>'myhome.ajax','uses'=>'HomepageController@myhomeAjax'));
Route::get('/home/ajax/{id}/{floor}',array('as'=>'myroom.ajax','uses'=>'HomepageController@myroomAjax'));

//detail Booking
Route::get('/detailBooking/{id}',array('as'=>'detailBooking','uses'=>'DetailBookingController@viewbook'));
Route::post('/detailBooking/{id}',array('as'=>'cancelBooking','uses'=>'DetailBookingController@cancel'));
Route::post('/detailBooking/{id}/{pin}',array('as'=>'submitBooking','uses'=>'DetailBookingController@submit'));

Route::post('/confirm_checkin','DetailBookingController@confirm');
Route::post('/confirm_cancel','DetailBookingController@cancel');

//Auth::routes();
//Admin only
Route::get('/admin/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout');


//Route::get('/admin/home', 'Auth\HomeController@index');

//Route::get('/Admin/home', 'Auth\HomeController@index');

//AdminRouting
Route::get('/admin/building', 'AdminFormController@viewall');
Route::get('/admin/home', 'AdminFormController@adminhome');
Route::get('/admin/time','AdminFormController@admintime');
Route::get('/admin/masterconfig','ConfigController@view');
Route::post('/admin/masterconfig/updateTime','ConfigController@updatetime');


//AdminRuangan
Route::get('/admin/editRoom/{id}','RoomController@updatepick');
Route::get('/admin/tambahRoom/{id_gedung}/{lantai}','RoomController@createhere');
Route::get('/admin/createRoom','RoomController@create');
Route::post('/admin/updateRoom','RoomController@update');
Route::post('/admin/deleteRoom','RoomController@delete');
Route::post('/admin/saveRoom','RoomController@store');

//AdminGedung
Route::get('/admin/editGedung','BuildingController@updatepick');
Route::get('/admin/createGedung','BuildingController@create');
Route::post('/admin/updateGedung','BuildingController@update');//dimana pengecekan ada ruangan di lantai atasnya, kalau ada return dulu
Route::post('/admin/updateconfirmGedung','BuildingController@updateconfirm');//confirmed
Route::post('/admin/deleteGedung/','BuildingController@delete');
Route::post('/admin/saveGedung','BuildingController@store');

//AdminBooklist
Route::get('/admin/booklisthistory','BooklistController@view');
Route::post('/admin/deleteBookList','BooklistController@delete');



