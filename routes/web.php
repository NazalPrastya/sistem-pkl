<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCompanyController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\PasswordController;

use App\Models\User;
use App\Models\Company;
use App\Models\Submission;
use GuzzleHttp\Middleware;

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
    return view('login.index');
});

Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

// Hak Akses Admin
Route::group(['middleware' => ['auth:admin']], function(){
    Route::get('/dashboard/submissions',[SubmissionController::class, 'indexs']);
    
    // company route
    Route::post('/dashboard/company',[DashboardCompanyController::class, 'store']);
    Route::get('/dashboard/company/create',[DashboardCompanyController::class,'create']);
    Route::put('/dashboard/company/{company:id}',[DashboardCompanyController::class, 'update']);
    Route::delete('/dashboard/company/{company:id}',[DashboardCompanyController::class,'destroy']);
    Route::get('/dashboard/company/{company:id}/edit',[DashboardCompanyController::class, 'edit']);
    
    // User Route
    Route::post('/dashboard/user',[DashboarduserController::class, 'store']);
    Route::get('/dashboard/user/create',[DashboarduserController::class,'create']);
    Route::put('/dashboard/user/{user:id}',[DashboarduserController::class, 'update']);
    Route::delete('/dashboard/user/{user:id}',[DashboarduserController::class,'destroy']);
    Route::get('/dashboard/user/{user:id}/edit',[DashboarduserController::class, 'edit']);
});


// Hak Akses User
Route::group(['middleware' => ['auth:user']], function() {
    Route::get('/dashboard/submission/create',[SubmissionController::class, 'create']);
    Route::post('/dashboard',[SubmissionController::class, 'store']);
    Route::get('/dashboard/submission',[SubmissionController::class, 'index']);
    Route::get('/dashboard/submission/{submission:id}/edit',[SubmissionController::class, 'edit']);
    Route::put('/dashboard/submission/{submission:id}',[SubmissionController::class, 'update']);
    
    Route::get('/dashboard/profile',[ProfileController::class, 'index']);
    Route::get('/dashboard/profile/{user:name}/edit',[ProfileController::class, 'edit']);
    Route::put('/dashboard/profile/{user:id}',[ProfileController::class, 'update']);

    Route::get('/dashboard/password/edit',[PasswordController::class, 'edit']);
    Route::put('/dashboard/password/update',[PasswordController::class, 'update']);


});


// Hak Akses
Route::group(['middleware' => ['auth:user,admin']], function(){
    Route::get('/dashboard',function (){
        return view('dashboard.index',[
            'user' => User::all(),
            'company' => Company::all()
        ]);
    });
    Route::delete('/dashboard/submission/{submissin:id}',[SubmissionController::class, 'destroy']);
    Route::get('/dashboard/show/{submission:id}',[SubmissionController::class, 'show']);

    Route::get('dashboard/user',[DashboardUserController::class, 'index'])->name('index');
    Route::get('/dashboard/user/{user:id} ',[DashboardUserController::class, 'show']);

    Route::get('dashboard/company',[DashboardCompanyController::class, 'index']);
    Route::get(' dashboard/company/{company:id}',[DashboardCompanyController::class, 'show']);
    Route::get('/dashboard/company/{company:id}',[DashboardCompanyController::class, 'show']);
});
