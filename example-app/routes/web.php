<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fcController;

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

Route::redirect('/', '/footballclub');
/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/footballclub', [fcController::class, 'getFCs']);
Route::get('/getfc/{id}', [fcController::class, 'getFC']);
Route::get('/create_form', [fcController::class, 'fcCreateForm']);
Route::post('/fcCreate', [fcController::class, 'fcCreate']);
