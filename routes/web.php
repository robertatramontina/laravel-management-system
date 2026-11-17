<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/homepage', [UtilController::class, 'loadHomepage']) ->name('home');

Route::get('/teste', function () {
    return view('welcome');
});

Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');


Route::get('/allusers', [UserController::class, 'alluser'] ) ->name('users.all');
// maneira de chamar pelo programador
// users é a funcionalidade all o que esta a fazer
// nesse caso to mostrando todos os utilizadores

Route::get('/adduser', [UserController::class, 'adduser'] ) ->name('users.add');

//rota de apagar users
Route::get('/delete-user/{id}', [UserController::class, 'deleteUsers'] ) ->name('users.delete');

//rota para editar users
Route::get('/edit-user/{id}', [UserController::class, 'editUsers'] ) ->name('users.edit');

//rota para registar users
Route::post('/store-users', [UserController::class, 'storeUsers'] ) ->name('users.store');

//apagar uma task
Route::get('/delete-task/{id}', [TaskController::class, 'deletetasks'] ) ->name('tasks.delete');

// editar uma task
Route::get('/edit-task/{id}', [TaskController::class, 'editTasks'] ) ->name('tasks.edit');

// rota para adicionar tarefas
Route::get('/addtask', [TaskController::class, 'addTasks'] ) ->name('tasks.add');

// rota para registar uma task POST
Route::post('/store-tasks', [TaskController::class, 'storeTasks'] ) ->name('tasks.store');

// rota para mostrar todas as tasks
Route::get('/alltasks', [TaskController::class, 'allTasks'] ) ->name('tasks.all');

////////////////////////////////////////////////////////////////////
// prendas de natal
////////////////////////////////////////////////////////////////////

// ver toda as prendas
Route::get('/allgifts/', [GiftController::class, 'allGifts'] ) ->name('gifts.all');

// adicionar uma prenda
Route::get('/addgifts', [GiftController::class, 'addGifts'])->name('gifts.add');

// guardar uma prenda
Route::post('/addgifts', [GiftController::class, 'storeGifts'] ) ->name('gifts.store');

// Ver / Editar uma prenda
Route::get('/editgift/{id}', [GiftController::class, 'editGifts']) ->name('gifts.edit');

// Apagar uma prenda
Route::get('/deletegift/{id}', [GiftController::class, 'deleteGifts']) ->name('gifts.delete');

// atualizar uma prenda
Route::put('/updategift/{id}', [GiftController::class, 'updateGifts']) ->name('gifts.update');



//rota fallback
Route::fallback(function(){
    return view('utils.fallback');
});
