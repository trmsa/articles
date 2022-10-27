<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BiologyController;
use App\Http\Controllers\PhysicsController;
use App\Http\Controllers\AerospaceController;
use App\Http\Controllers\CosmologyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::resource('cosmologies', CosmologyController::class);
Route::resource('aerospaces', AerospaceController::class);
Route::resource('biologys', BiologyController::class);
Route::resource('physics', PhysicsController::class);

Route::get('/upload', [UploadController::class, 'show'])->name('upload.show')->middleware('exist.infomation');
Route::post('/upload', [UploadController::class, 'store'])->name('upload.store')->middleware('exist.infomation');
Route::get('/upload/resault', [UploadController::class, 'resault'])->name('upload.resault');

Route::get('/account', [AccountController::class, 'index'])->name('account.index');
Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::post('/account/{user}', [AccountController::class, 'update'])->name('account.update');
Route::put('/account/password/{user}', [AccountController::class, 'passwordUpdate'])->name('password.change');
Route::get('/account/password', [AccountController::class, 'showFormPassword'])->name('password.form');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/cosmologies', [AdminController::class, 'cosmology'])->name('admin.cosmology');
Route::get('/admin/aerospaces', [AdminController::class, 'aerospace'])->name('admin.aerospace');
Route::get('/admin/biologys', [AdminController::class, 'biology'])->name('admin.biology');
Route::get('/admin/physics', [AdminController::class, 'physic'])->name('admin.physic');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/approve', [AdminController::class, 'approve'])->name('admin.approve');
Route::post('/admin/approve/{user}', [AdminController::class, 'confirmUser'])->name('admin.confirmUser');
Route::delete('/admin/not-approve-user/{user}', [AdminController::class, 'notApprovedUser'])->name('admin.notApprovedUser');
Route::put('/admin/Suspension/{user}', [AdminController::class, 'userSuspension'])->name('admin.userSuspension');
Route::post('/admin/download/{file}', [AdminController::class, 'download'])->name('admin.download');
Route::get('/admin/password', [AdminController::class, 'showPasswordForm'])->name('admin.password');
Route::put('/admin/password/{user}', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');
Route::get('/admin/about', [AdminController::class, 'about'])->name('admin.about');
Route::put('/admin/about', [AdminController::class, 'aboutEdit'])->name('admin.about.edit');
Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
Route::put('/admin/contact', [AdminController::class, 'contactEdit'])->name('admin.contact.edit');
Route::get('/admin/upgrade', [AdminController::class, 'upgradeDegree'])->name('admin.upgrade.degree');
Route::delete('/admin/not-approve-degree/{degree}', [AdminController::class, 'notApprovedDegree'])->name('admin.notApprovedDegree');
Route::post('/admin/approve-degree/{degree}', [AdminController::class, 'approvedDegree'])->name('admin.approvedDegree');
// Route::post('/admin/upgrade', [AdminController::class, 'upgradeDegree'])->name('admin.upgrade.degree');



