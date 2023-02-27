<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPortfolioController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;
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

Route::get('/', function () {
    return view('layout.master');
});

Route::get('/portfolio', function () {
    return view('layout.master2');
});
Route::get('/view-profile', [ProfileController::class, 'viewProfile'])->name('admin.viewProfile');
Route::post('/add-profile', [ProfileController::class, 'addProfile'])->name('admin.addProfile');
Route::post('/edit-profile/{id}', [ProfileController::class, 'editProfile'])->name('admin.editProfile');
Route::get('/delete-profile/{id}', [ProfileController::class, 'deleteProfile'])->name('admin.deleteProfile');
Route::get('/deleated-user',[ProfileController::class,'deleatedUser'])->name('admin.deleatedUser');
Route::get('/view-deleated-user/{id}',[ProfileController::class,'viewDeleatedUser'])->name('viewDeleatedUser');

Route::get('/view-home', [HomeController::class, 'viewHome'])->name('admin.viewHome');
Route::post('/add-home', [HomeController::class, 'addHome'])->name('admin.addHome');
Route::post('/edit-home/{id}', [HomeController::class, 'editHome'])->name('admin.editHome');
Route::get('/delete-home/{id}', [HomeController::class, 'deleteHome'])->name('admin.deleteHome');

Route::get('/view-about', [AboutController::class, 'viewAbout'])->name('admin.viewAbout');
Route::post('/add-about', [AboutController::class, 'addAbout'])->name('admin.addAbout');
Route::post('/edit-about/{id}', [AboutController::class, 'editAbout'])->name('admin.editAbout');
Route::get('/delete-about/{id}', [AboutController::class, 'deleteAbout'])->name('admin.deleteAbout');

Route::get('/view-education', [EducationController::class, 'viewEducation'])->name('admin.viewEducation');
Route::post('/add-education', [EducationController::class, 'addEducation'])->name('admin.addEducation');
Route::post('/edit-education/{id}', [EducationController::class, 'editEducation'])->name('admin.editEducation');
Route::get('/delete-education/{id}', [EducationController::class, 'deleteEducation'])->name('admin.deleteEducation');

Route::get('/view-portfolio', [PortfolioController::class, 'viewPortfolio'])->name('admin.viewPortfolio');
Route::post('/add-portfolio', [PortfolioController::class, 'addPortfolio'])->name('admin.addPortfolio');
Route::post('/edit-portfolio/{id}', [PortfolioController::class, 'editPortfolio'])->name('admin.editPortfolio');
Route::get('/delete-portfolio/{id}', [PortfolioController::class, 'deletePortfolio'])->name('admin.deletePortfolio');





// myportfolio
Route::get('/home', [MyPortfolioController::class, 'home'])->name('admin.home');
Route::get('/my-about', [MyPortfolioController::class, 'about'])->name('admin.about');
Route::get('/my-education', [MyPortfolioController::class, 'education'])->name('admin.education');
Route::get('/my-portfolio', [MyPortfolioController::class, 'portfolio'])->name('admin.portfolio');
