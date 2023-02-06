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
// go to single item
Route::get('/person/show/{person}', [MainController::class , 'singlePerson'])
    ->name('person.singlePerson');
//     delete item
Route::get('/person/delete/{person}',[MainController::class, 'deletePerson'])
     ->name('person.delete');
// go to add new element page
Route::get('person/addnew' , [MainController::class , 'addNew'])
     ->name('person.add');
Route::post('person/addnew' , [MainController::class, 'addStore'])
     ->name('person.store');
     // edit single element
Route::get('person/edit/{person}',[MainController::class, 'goToEditForm'])
     ->name('person.goToEditForm');
Route::post('person/edit/{person}',[MainController::class, 'editPerson'])
     ->name('person.edit');