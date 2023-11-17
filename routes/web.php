<?php

use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\AssignTagController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OnboardingParticipantController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('roles',RoleController::class);
    Route::resource('unit_kerja',UnitKerjaController::class);
    Route::resource('data_user',UserDataController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('assignrole',AssignRoleController::class);
    Route::resource('assignpermission',AssignPermissionController::class);
    Route::resource('content',ContentController::class);
    Route::resource('guide',GuideController::class);


    Route::get('/search',[GuideController::class, 'search']);

    Route::resource('onboarding',OnboardingController::class);
    Route::resource('ob_participant',OnboardingParticipantController::class);
  

    // Route::resource('profile',ProfileController::class);

    // Route::get('/editProfile', [App\Http\Controllers\EditProfileController::class, 'edit'])->name('edit.profile');

    // Route::post('/updateProfile', [App\Http\Controllers\EditProfileController::class, 'update'])->name('update.profile');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
