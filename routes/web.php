<?php

use Illuminate\Support\Facades\Route;

// Cargando clases
use App\Http\Middleware\ApiAuthMiddleware;

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

//Rutas del controlador cliente
Route::post('/api/client/register', 'ClientController@register');
Route::post('/api/client/login', 'ClientController@login');
Route::put('/api/client/update', 'ClientController@update');
Route::post('/api/client/upload' ,'ClientController@upload')->middleware(ApiAuthMiddleware::class);
Route::get('/api/client/avatar/{filename}', 'ClientController@getImage');
Route::get('/api/client/detail/{id}', 'ClientController@detail');

//Rutas del controlador Comercio
Route::post('/api/commerce/register', 'CommerceController@register');
Route::post('/api/commerce/login', 'CommerceController@login');
Route::put('/api/commerce/update', 'CommerceController@update');
Route::post('/api/commerce/upload' ,'CommerceController@upload')->middleware(ApiAuthMiddleware::class);
Route::get('/api/commerce/avatar/{filename}', 'CommerceController@getImage');
Route::get('/api/commerce/detail/{id}', 'CommerceController@detail');

// Rutas del controlador de Categoria
Route::resource('/api/category', 'CategoryController');
    
// Rutas del controlador de promocion
Route::resource('/api/promotion', 'PromotionController'); //CRUD
Route::get('/api/promotion/getpromos/{id}', 'PromotionController@getPromotionsBycommerce'); //optener promos por medio de la llave foranea
Route::post('/api/promotion/upload' ,'PromotionController@upload')->middleware(ApiAuthMiddleware::class);
Route::get('/api/promotion/images/{filename}', 'PromotionController@getImage');
   
// Rutas del controlador de Venta   
Route::resource('/api/sale', 'SaleController'); //CRUD

// Rutas del controlador de Servicio
Route::resource('/api/service', 'ServiceController'); //CRUD
Route::get('/api/service/getservicecommerce/{id}', 'ServiceController@getServicesBycommerce');

// Rutas del controlador de Cita
Route::resource('/api/appointment', 'AppointmentController'); //CRUD
Route::get('/api/appointment/getdatecommerce/{id}', 'AppointmentController@getAppointmentsBycommerce'); 
Route::get('/api/appointment/getdateclient/{id}', 'AppointmentController@getAppointmentsByclient');