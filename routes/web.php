<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ActorsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\KeywordsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\photosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\authController;

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
    return view('welcome');
});



Route::prefix('control')->group(function(){
    Route::get('/login', [authController::class, 'showLoginForm'])->name('control.login');
    Route::post('/login', [authController::class, 'login'])->name('control.login.submit');
    Route::get('/register', [authController::class, 'showRegisterForm'])->name('control.register');
    Route::post('/register', [authController::class, 'register'])->name('control.register.submit');
    Route::get('/forget_passowrd', [authController::class, 'forget_passowrd'])->name('control.forget_passowrd');
    Route::post('/forget_passowrd', [authController::class, 'forget_passowrd_post'])->name('control.forget_passowrd.submit');
    Route::get('/recover_password/{token}', [authController::class, 'recover_password'])->name('control.recover_password');
    Route::post('/recover_password/{token}', [authController::class, 'recover_password_post'])->name('control.recover_password.submit');
    Route::any('/logout', [authController::class, 'logout'])->name('control.logout');
    
    Route::get('/', [homeController::class, 'index'])->name('control.index');

    Route::resource('/actors', ActorsController::class);
	Route::delete('/actorsMultiDelete', [ActorsController::class, 'multiDestroy']);

	Route::resource('/genres', GenresController::class);
	Route::delete('/genersMultiDelete', [GenresController::class, 'multiDestroy']);

	Route::resource('/movies', MoviesController::class);
	Route::delete('/moviesMultiDelete', [MoviesController::class, 'multiDestroy']);

	Route::resource('/series', SeriesController::class);
	Route::delete('/seriesMultiDelete', [SeriesController::class, 'multiDestroy']);

	Route::resource('/seasons', SeasonsController::class);
	Route::delete('/seasonsDeleteAll', [SeasonsController::class, 'multiDestroy']);

	Route::resource('/episodes', EpisodesController::class);
	Route::delete('/episodesDeleteAll', [EpisodesController::class, 'multiDestroy']);

	Route::resource('/likes', LikesController::class);
	Route::delete('/likesDeleteAll', [LikesController::class, 'multiDestroy']);

	Route::resource('/reviews', ReviewsController::class);
	Route::delete('/reviewsDeleteAll', [ReviewsController::class, 'multiDestroy']);

	Route::resource('/articles', ArticlesController::class);
	Route::delete('/articlesDeleteAll', [ArticlesController::class, 'multiDestroy']);

	Route::resource('/categories', CategoriesController::class);
	Route::delete('/categoriesDeleteAll', [CategoriesController::class, 'multiDestroy']);

	Route::resource('/comments', CommentsController::class);
	Route::delete('/commentsDeleteAll', [CommentsController::class, 'multiDestroy']);


	Route::resource('/tags', TagsController::class);
	Route::delete('/tagsDeleteAll', [TagsController::class, 'multiDestroy']);

	Route::resource('/keywords', KeywordsController::class);
	Route::delete('/keywordsDeleteAll', [KeywordsController::class, 'multiDestroy']);


	Route::resource('/users', UsersController::class);
	Route::delete('/usersDeleteAll', [UsersController::class, 'multiDestroy']);



	Route::resource('/admins', AdminsController::class);
	Route::delete('/adminsDeleteAll', [AdminsController::class, 'multiDestroy']);


});
