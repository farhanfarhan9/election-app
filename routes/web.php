<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\voter\VoterController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ElectionController;
use App\Http\Controllers\dashboard\CandidateController;
use App\Http\Controllers\dashboard\DashboardController;


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
    return view('index');
});

Auth::routes();

Route::get('/register-voter', [VoterController::class, 'create'])->name('register_voter');
Route::get('/login-voter', [VoterController::class, 'login'])->name('login_voter');
Route::post('/register-voter', [VoterController::class, 'register'])->name('store_register_voter');
Route::post('/authenticate', [VoterController::class, 'authenticate'])->name('authenticate_voter');

Route::group(['middleware' => 'auth','prefix'=>'home','as'=>'home.'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);
    Route::resource('/elections', ElectionController::class);
    Route::resource('/candidates', CandidateController::class);
});

Route::group(['prefix'=>'voter', 'as'=>'voter.'], function(){
    Route::get('/', [VoterController::class, 'index'])->name('index');
});
