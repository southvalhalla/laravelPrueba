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

Route::get('/', function () { // routa raiz
    return view('welcome');
});

Route::get('/post', function () {
    return 'hola mundo :v';
});

Route::get('/post/{id}', function ($id) { //asi se pasan valores por la ruta
    return 'el numero de esta pagina es: ' . $id;
});

Route::get('/post/{id}/{name}', function ($id,$name) {
    return 'el numero de esta pagina es: ' . $id . ' y el nombre ingresado es: ' . $name;
})->where('name','[a-zA-Z]+'); // expresion regular
