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
