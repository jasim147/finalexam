<?php
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [EmployeeController::class, 'form_view'])->name('form');
Route::post('/form', [EmployeeController::class, 'insert'])->name('insert');
Route::get('/display', [EmployeeController::class,'display'])->name('display');
Route::get('/edit/{id}', [EmployeeController::class,'edit'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class,'update'])->name('update');
Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');