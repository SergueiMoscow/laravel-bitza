<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ExpectedPaymentsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/', function () {
    return view('public', ['lang' => App::getLocale()]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('expectedPayments');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/expectedpayments', [ExpectedPaymentsController::class, 'expectedPayments'])->name('expectedpayments');
    Route::get('/contacts/search', [ContactController::class, 'search']);
    Route::get('/contracts/search', [ContractController::class, 'search']);
    Route::get('/contacts/list', [ContactController::class, 'getList']);
    Route::post('/payments/r2', [PaymentsController::class, 'getRoom2']);

    Route::resource('contacts', ContactController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('payments', PaymentsController::class);
// register new users can realize only registered user 
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'setLanguage'])->name('profile.language');
});

require __DIR__.'/auth.php';
