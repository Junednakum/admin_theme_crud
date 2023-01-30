<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;

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

// Route::get('/', function () {
//     return view('admin.auth_login');
// });
// clear chech routes 
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    return '<h1>Cache cleared</h1>';
});

// login default page 
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
// authentication check routes 
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::group(['middleware' => ['LoginCheck']], function () {
    // get profile data 
    Route::get('/editprofile', [AuthController::class, 'editprofile'])->name('editprofile');
    // update profile 
    Route::post('/update-profile', [AuthController::class, 'UpdateProfile'])->name('update.profile');
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // iteam modules routes
    // get all the list of items
    Route::get('/items', [ItemsController::class, 'index'])->name('items');
    // get item by id
    Route::get('/viewitem/{id}', [ItemsController::class, 'viewList'])->name('viewitem');
    // add item route only show view page 
    Route::get('/itemsadd', [ItemsController::class, 'additem'])->name('itemsadd');
    // store item 
    Route::post('/store', [ItemsController::class, 'store'])->name('store');
    // get item by id for edit form 
    Route::get('/itemedit/{id}', [ItemsController::class, 'edit'])->name('itemedit');
    
    // delete item route
    Route::delete('/deleteitem', [ItemsController::class, 'deleteitem'])->name('deleteitem');
});