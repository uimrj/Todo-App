<?php
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/home', [TodoListController::class, 'home'])->name('todolist.home');

Route::get('/add', [TodoListController::class, 'add'])->name('todolist.add');

Route::get('/{id}/edit', [TodoListController::class, 'edit'])->name('todolist.edit');

Route::put('/{id}/edit/U', [TodoListController::class, 'update'])->name('todolist.update');

Route::post('/save', [TodoListController::class, 'save'])->name('todolist.save');

Route::delete('/todo/{id}', [TodoListController::class, 'destroy'])->name('todolist.destroy');

Route::get('/about', [TodoListController::class, 'about'])->name('todolist.about');

Route::post('/change-status', [TodoListController::class, 'changeStatus'])->name('change.status');

Route::get('/login', [TodoListController::class, 'login'])->name('todolist.login');

Route::get('/register', [TodoListController::class, 'register'])->name('todolist.register');

Route::get('/dashboard', [TodoListController::class, 'dashboard'])->name('todolist.dashboard');

Route::post('/registerUser', [TodoListController::class, 'registerUser'])->name('todolist.registerUser');

Route::post('/loginUser', [TodoListController::class, 'loginUser'])->name('todolist.loginUser');

Route::post('/logout', [TodoListController::class, 'logout'])->name('todolist.logout');

Route::get('/gallery', [TodoListController::class, 'gallery'])->name('todolist.gallery');

Route::get('/', [TodoListController::class, 'welcome'])->name('todolist.welcome');



