<?php
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', [TodoListController::class, 'home'])->name('todolist.home');

Route::get('/add', [TodoListController::class, 'add'])->name('todolist.add');

Route::get('/{id}/edit', [TodoListController::class, 'edit'])->name('todolist.edit');

Route::put('/{id}/edit/U', [TodoListController::class, 'update'])->name('todolist.update');

Route::post('/save', [TodoListController::class, 'save'])->name('todolist.save');

Route::delete('/todo/{id}', [TodoListController::class, 'destroy'])->name('todolist.destroy');

