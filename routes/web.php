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

Route::get('/', 'WechatController@index')->name('home');

Route::get('/oauth_callback', 'Auth\LoginController@oauthCallback');

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/users/bindmobile', 'BindMobileController@index')->name('bind.mobile');
Route::post('/users/bindmobile', 'UserController@mobile')->name('user.bindmobile');
Route::post('/users/sendmobile', 'BindMobileController@store')->name('user.send.mobile');
Route::get('/users/profile', 'UserController@profile')->name('user.profile');
Route::get('/users/favorites', 'UserController@favorites')->name('user.favorites');
Route::get('/users/threads', 'UserController@threads')->name('user.threads');
Route::get('/users/replies', 'UserController@replies')->name('user.replies');
Route::get('/users/demands', 'UserController@demands')->name('user.demands');
Route::get('/users/balances', 'UserController@balances')->name('user.balances');
Route::get('/users/recharges', 'UserController@recharges')->name('user.recharges');
Route::get('/users/bills', 'UserController@bills')->name('user.bills');
Route::get('/users/notifications', 'NotificationController@index')->name('user.notifications');


Route::get('/threads', 'ThreadController@index')->name('threads.index');
Route::get('/threads/create', 'ThreadController@create')->name('threads.create');
Route::get('/threads/channels', 'ChannelController@index')->name('threads.channels');
Route::get('/threads/{channel}', 'ThreadController@index')->name('threads.index.channel');
Route::post('/threads', 'ThreadController@store')->name('threads.store');
Route::get('/threads/{channel}/{thread}', 'ThreadController@show')->name('threads.show');
Route::post('/threads/{channel}/{thread}/favorites', 'ThreadFavoriteController@store')->name('threads.favorite');
Route::delete('/threads/{channel}/{thread}/favorites', 'ThreadFavoriteController@destory')->name('threads.unfavorite');
Route::post('/threads/{channel}/{thread}/reply', 'ReplyController@store')->name('reply.store');


Route::delete('/replies/{reply}', 'ReplyController@destory')->name('reply.delete');
Route::post('/replies/{reply}/favorites', 'ReplyFavoriteController@store')->name('reply.favorite');
Route::delete('/replies/{reply}/favorites', 'ReplyFavoriteController@destory')->name('reply.unfavorite');


Route::get('/posts', 'PostController@index')->name('posts.index');


Route::get('/categories', 'CategoryController@index')->name('categories.index');


Route::get('/demands', 'DemandController@index')->name('demands.index');
Route::get('/demands/{demand}', 'DemandController@show')->name('demands.show');

Route::post('/recharge/{recharge}/bill', 'BillController@store')->name('bill.create');

Route::get('/books', 'BookController@index')->name('books.index');
Route::get('/books/{category}', 'BookController@index')->name('books.category.index');
Route::get('/books/{category}/{book}', 'BookController@show')->name('books.show');

Route::get('/users/{user}/chat', 'ChatController@index')->name('users.chat.index');
Route::post('/users/{user}/chat', 'ChatController@store')->name('users.chat.store');

Route::get('/users/{user}/guest', function () {
    \Auth::login(\App\User::find(20));
});

Auth::routes();
