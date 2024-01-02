<?php

use App\Models\Type;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardExpenseController;
use App\Http\Controllers\DashboardIncomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;


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
    return view('home', [
        "title"=> "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Zaky Imad",
        "email" => "zakyimad@gmail.com",
        "image" => "Ciremai.jpg"
    ]);
});

Route::get('/profil', function () {
    return view('profil', [
        "title" => "About",
        "name" => "Zaky Imad",
        "email" => "zakyimad@gmail.com",
        "image" => "Ciremai.jpg"
    ]);
});

Route::get('/finnanceapp', [TransactionController::class, 'index']);

Route::get('finnanceapp/{transaction:slug}', [TransactionController::class, 'show']);

Route::get('/types', function() {
    return view('types', [
        'title' => 'Tipe Transaksi',
        'types' => Type::all()
    ]);
});

Route::get('/type/{type:slug}', function(Type $type) {
    return view('type', [
        'title' => $type->name,
        'transactions' => $type->transaction->load('user','type'),
        'type' => $type->name
    ]);
});

Route::get('/author/{user:username}', function(User $user) {
    return view('finnanceapp', [
        'title' => 'User Post',
        'transactions' => $user->transactions->load('user','type'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function(){

    return view('dashboard.index');

})->middleware('auth');

Route::resource('/dashboard/expenses', DashboardExpenseController::class)->middleware('auth');

Route::resource('/dashboard/incomes', DashboardIncomeController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/setting', [SettingController::class, 'index']);
