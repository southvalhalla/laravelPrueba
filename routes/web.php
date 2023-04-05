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

use App\Product;

Route::get('/read',function(){
    $products=Product::all();

    foreach($products as $product){
        echo $product->product_name;
    }

    return $products;
});

Route::get('/filter',function(){
    $products=Product::where('category','fruta')
    ->take(3)
    ->orderBy('product_name','asc')
    ->get();
    // ->min('price');

    return $products;
});

Route::get('/insert',function(){
    $products=new Product();

    $products->product_name = 'papaya';
    $products->price = '2400';
    $products->category = 'fruta';
    $products->characteristics = 'fresca';
    $products->ref = 'f6545';

    $products->save();
});

Route::get('/update',function(){
    $products=Product::find(2);

    $products->product_name = 'pera';
    $products->price = '900';
    $products->category = 'fruta';
    $products->characteristics = 'fresca';
    $products->ref = 'f7845';

    $products->save();
});


Route::get('/update/{id}/{name}',function($id,$name){
    $products=Product::find($id);

    $products->product_name = $name;

    $products->save();
})->where([
    'id'    => '[0-9]+',
    'name'  => '[a-zA-Z]+'
]);

// Route::get('/', function () { // routa raiz
//     return view('welcome');
// });

// Route::get('/inicio','CrudController@index');

// Route::get('/inicio/{id}','CrudController@params')->where('id','[0-9]+');

// Route::get('/','PageController@homePage');
// Route::get('/home','PageController@homePage');

// Route::get('/about_us','PageController@aboutUs');

// Route::get('/contact_us','PageController@contactUs');


Route::resource('post','CrudController');


//! Raw SQL Query

// Route::get('insert', function () {

//     DB::insert('INSERT INTO products (product_name,price,category,characteristics,ref) VALUES (?,?,?,?,?)', ['manzana',1200,'fruta','fresca','f3232']);

// });

// Route::get('select', function () {

//     $results = DB::select('SELECT * FROM products WHERE id=?', [1]);

//     foreach($results as $result){

//         return $result->product_name;

//     }

// });

// Route::get('update/{name}', function ($name) {

//     DB::update('UPDATE products SET product_name = ? WHERE id = ?', [$name,1]);

// })->where('name','[a-zA-Z]+');

// Route::get('/post', function () {
//     return 'hola mundo :v';
// });

// Route::get('/post/{id}', function ($id) { //asi se pasan valores por la ruta
//     return 'el numero de esta pagina es: ' . $id;
// });

// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return 'el numero de esta pagina es: ' . $id . ' y el nombre ingresado es: ' . $name;
// })->where('name','[a-zA-Z]+'); // expresion regular
