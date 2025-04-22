<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

//Route::get('/', [CursoController::class, 'getName'])->name('home');
Route::get('/', function () {
    return view('welcome', ['nombre' => 'Juan']);
})->name('welcome');

Route::get('/prueba', function () {
   /*
    User::create([
        'name' => 'Pepe', 
        'lastname' => 'Valencia', 
        'email' => 'pepev@pepe.com', 
        'phone' => '+5299999999', 
        'password' => Hash::make('1234')
    ]);  
    

    Phone::create([
        'number' => '+5299999999',        
        'user_id' => 1
    ]);
    */

    //$user = User::where('id', 1)->with('phone')->first();
    $phone = Phone::where('id', 1)->with('user')->first();
    $phone = Phone::find(1);
    
    //return $user;
    return $phone;

});

Route::get('datos', [UserController::class, 'data']);
Route::get('guardar', [UserController::class, 'store']);
Route::get('actualizar/{id}', [UserController::class, 'update']);
Route::get('borrar/{id}', [UserController::class, 'destroy']);

Route::get('form', function () {
    return view('form');
});
Route::put('form', [UserController::class, 'store'])->name('save');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index'); 
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');    
});


Route::view('mostrar','display', ['message' => '<p> Esto es un parrafo</p>'])->name('display');
Route::view('incluir','incluir');
Route::get('directivas', [UserController::class, 'index']);

Route::get('/ejemplo2', [CursoController::class, 'index'])->name('curso.index');

//Route::view('ejemplo', 'example', ['name' => 'Juan'])->name('example');
Route::get('ejemplo', function () {
    return view('example', ['name' => 'James']);
})->name('example');

Route::resource('users', AdminUserController::class)->parameters([
    'users' => 'admin_user'
]);

Route::resource('users', AdminUserController::class)->names([
    'create' => 'users.build'
]);
Route::get('/hola', function () {
    return route('hola');
})->name('hola');


Route::get('/suma', [CursoController::class, 'index'])->name('plus');

Route::get('/suma/{x}/{y}', function ($x, $y) {
    $a=[1,2,3,4];
    $aa=['nombre' => 'Juan', 'apellido' => 'Perez'];
    return 'La suma es:'.$x + $y;
})->where(['x' => '[0-9]+', 'y' => '[0-9]+'])->name('suma');

Route::get('/nombre/{name?}', function ($name='Juan') {
    return 'Mi nombre es: '.$name;
})->where('name', '[A-Za-z]+');

Route::redirect('/sumar', '/cursolaravel/public/suma',302);

Route::get('/verificar', function (Request $request) {     
    if($request->route()->named('verificar')) {
        return "OK";
    }else{
        return "NO existe";
    }    
})->name('verificar');

Route::prefix('admin')->group(function () {
    Route::get('/primero', function () {
        return 'Primero';
    })->name('admin.primer');
    Route::get('/segundo', function () {        
        return 'Segundo';
    })->name('admin.segundo');
});

Route::get('suscribed',function(){
    return 'Bienvenido suscrito';
})->middleware('subscribed');
