<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* пример
Route::get('/', function(){
    return response()->json(['user'=>['name'=>'mad', 'tel'=>'025878965']], 200);
});
*/

// все посты
Route::get('/news', 'ApiCRUDcontroller@show');
//одна новость по ключу
Route::get('/news/{id}', 'ApiCRUDcontroller@singleShow');
//создать новость через пост запрос
Route::post('/news', 'ApiCRUDcontroller@create');
//редактировать новость через пост запрос
Route::put('/news/{id}', 'ApiCRUDcontroller@redact');
//удалить новость
Route::delete('/news/{id}', 'ApiCRUDcontroller@delete');
