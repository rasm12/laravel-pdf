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
    return view('pdf_read');
});

Route::get('/pdf', function() {
    return view('pdf_read');
});
Route::post('/read',"ReadPdfController@read");
#Route::post('/uploadfile','ReadPdfController@showUploadFile');
Route::post('/test','ReadPdfController@generate');


