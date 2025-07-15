<?php

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

Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.index');

Route::get('/kullanici-giris', [\App\Http\Controllers\Site\AuthController::class, 'index'])->name('user.login');
Route::post('/user-check', [\App\Http\Controllers\Site\AuthController::class,'login'])->name('user.checklogin');

Route::get('/kullanici-kayit', [\App\Http\Controllers\Site\AuthController::class, 'register'])->name('user.register');
Route::post('/user-store', [\App\Http\Controllers\Site\AuthController::class,'userStore'])->name('user.userStore');

Route::middleware('user')->prefix('user')->as('user.')->group(function () {
    //ACCOUNT
    Route::get('/hesabim', [\App\Http\Controllers\User\AccountantController::class,'index'])->name('account');

    //Aile Bireyleri ekle
    Route::get('/bireyler', [\App\Http\Controllers\User\FamilyController::class,'index'])->name('family');
    Route::get('/birey-ekle', [\App\Http\Controllers\User\FamilyController::class,'create'])->name('family.create');
    Route::post('/familyStore', [\App\Http\Controllers\User\FamilyController::class,'store'])->name('family.store');

    //Harcama ekle
    Route::get('/harcamalar', [\App\Http\Controllers\User\ExpenseController::class,'index'])->name('expenses.index');
    Route::get('/harcama-ekle', [\App\Http\Controllers\User\ExpenseController::class,'create'])->name('expenses.create');
    Route::post('/expenseStore', [\App\Http\Controllers\User\ExpenseController::class,'store'])->name('expenses.store');
    Route::get('/harcama-düzenle/{id}', [\App\Http\Controllers\User\ExpenseController::class,'edit'])->name('expenses.edit');
    Route::put('/harcama/{id}', [\App\Http\Controllers\User\ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/harcama/{id}', [\App\Http\Controllers\User\ExpenseController::class, 'destroy'])->name('expenses.destroy');


    Route::get('/cikis', [\App\Http\Controllers\User\AccountantController::class,'logout'])->name('logout');

});

