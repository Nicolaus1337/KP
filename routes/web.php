<?php

use App\Http\Controllers\AssignParticipant;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\AssignTagController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ObParticipantContentController;
use App\Http\Controllers\OnboardingContentController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OnboardingParticipantContentController;
use App\Http\Controllers\OnboardingParticipantController;
use App\Http\Controllers\OnboardingUserController;
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





Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('dashboard', RoleController::class);
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

    Route::get('onboarding/{onboarding}/addparticipant', [OnboardingController::class, 'addparticipant'])->name('onboarding.addparticipant');
    Route::put('onboarding/{onboarding}/editparticipant', [OnboardingController::class, 'updateparticipant'])->name('onboarding.updateparticipant');
    Route::delete('onboarding/{onboarding}/participants/{userid}', [OnboardingController::class, 'deleteparticipant'])->name('onboarding.deleteparticipant');

    Route::get('onboarding/{onboarding}/addcontent', [OnboardingController::class, 'addcontent'])->name('onboarding.addcontent');
    Route::put('onboarding/{onboarding}/editcontent', [OnboardingController::class, 'updatecontent'])->name('onboarding.updatecontent');
    Route::delete('onboarding/{onboarding}/contents/{contentid}', [OnboardingController::class, 'deletecontent'])->name('onboarding.deletecontent');


    Route::resource('onboarding_user',OnboardingUserController::class);
    Route::resource('assignparticipant',AssignParticipant::class);
    
    
    Route::get('onboarding/{onboarding}/contentsview/{contents}', [OnboardingController::class, 'showcontent'])->name('onboarding.showcontent');


  
});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
