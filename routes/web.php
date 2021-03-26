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

Route::get('/', IndexController::class)->name('index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contacts', 'PagesController@contacts')->name('contacts');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/author/{key}', Posts_by_author_Controller::class)->name('posts_by_author');
Route::get('/category/{key}', Posts_by_category_Controller::class)->name('posts_by_category');
Route::get('/post/{id}', Single_post_Controller::class)->name('single_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Админ панель
Route::get('/admin/add_post', 'Admin_post_Controller@add_post')->name('add_post');
//Добавить пост
Route::post('/admin/add_post', 'Admin_post_Controller@save_post')->name('save_post');
//Удалить пост
Route::get('/admin/delete_post', 'Admin_post_Controller@delete_post')->name('delete_post_get');
Route::delete('/admin/delete_post', 'Admin_post_Controller@delete_post')->name('delete_post_delete');
//Редактировать пост
Route::get('/admin/edit_post/{id}', 'Admin_post_Controller@edit_post')->name('edit_post_get');
Route::post('/admin/edit_post/{id}', 'Admin_post_Controller@edit_save')->name('edit_post_post');
//Комментировать
Route::post('/post/{id}', 'Add_comment_Controller@save_comment')->name('save_comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Email подписка mail_subscriber
Route::post('/mail_subscriber', MailSubscriberController::class)->name('mail_subscriber');
