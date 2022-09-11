<?php
namespace App\Http\Controllers;

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

Route::get('/login', function () {
    return view('login');
});
Route::post('/login_admin', [Controller::class, 'login']);

Route::middleware('AdminValidation')->group(function () {

Route::get('/', function () {
    return view('app');
})->name('admin_dashboard');

Route::get('/add_user', function () {
    return view('add_user');
})->name('add_user');
Route::get('/edit_user/{id}', function ($id) {
    return view('add_user',['id'=>$id]);
})->name('add_user');
Route::get('/org', function () {
    return view('org');
})->name('org');

Route::post('/uplaod-pic', [Controller::class, 'uploadPic']);

Route::get('/logout', [Controller::class, 'logout'])->name('logout');
});
