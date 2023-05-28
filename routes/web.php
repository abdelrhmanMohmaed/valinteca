<?php

use App\Http\Controllers\GeneralController;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Route;

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

    return view('welcome');
});


Route::prefix('question')->group(function () {
    
    Route::get('2', [GeneralController::class, 'Q2'])->name('Q2');
    
    
    Route::get('4', [GeneralController::class, 'Q4'])->name('Q4');
    Route::get('7', [GeneralController::class, 'Q7'])->name('Q7');
    Route::view('8', 'Questions.Q8');
    Route::post('8', [GeneralController::class, 'Q8'])->name('Q8');
    Route::get('9', [GeneralController::class, 'Q9'])->name('Q9');
    Route::get('10', [GeneralController::class, 'Q10'])->name('Q10');
    Route::get('11', [GeneralController::class, 'Q11'])->name('Q11');

    Route::view('12', 'Questions.Q12');
});
