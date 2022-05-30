<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomPagesController;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('pages', PageController::class)->only(['index', 'store']);

    Route::get('logout', 'LoginController@logout');
});

Route::post('/save-page', [CustomPagesController::class, 'store']);
Route::get('/published/{id}',  [CustomPagesController::class, 'loadPages']);