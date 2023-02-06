<?php
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home'])
     ->name('person.home');

Route::get('/person/show/{person}', [MainController::class , 'singlePerson'])
    ->name('person.singlePerson');
Route::get('/person/delete/{person}',[MainController::class, 'deletePerson'])
     ->name('person.delete');