<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewsController::class,'index'])
    -> name('site.index');

Route::get('/register', [ViewsController::class, 'register'])
    -> name('site.register')
    -> middleware('guest');

Route::post('/register', [ActionsController::class, 'register'])
    -> middleware('guest');

Route::get('/exit', [ActionsController::class,'logout'])
    ->name('site.logout')
    ->middleware('auth');

Route::get('/login', [ViewsController::class,'login'])
    ->name('site.login')
    ->middleware('guest');

Route::post('/login', [ActionsController::class,'login'])
    ->middleware('guest');

Route::get('/quest/create', [ViewsController::class,'quest_create'])
    ->name('quest.create')
    ->middleware('auth');

Route::post('/quest/create', [ActionsController::class,'quest_create'])
    ->middleware('auth');

Route::get('/quest/{quest_id}', [ActionsController::class,'quest_check'])
    ->name('quest.check')
    ->middleware('auth');

Route::get('/task/create/{quest_id}', [ActionsController::class,'tasks_create_web'])
    ->name('tasks.create')
    ->middleware('auth');

Route::post('/task/create/{quest_id}', [ActionsController::class,'tasks_create'])
    ->middleware('auth');
