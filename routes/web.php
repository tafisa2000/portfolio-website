<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdiminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortifolioController;

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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route :: middleware('auth')->group(function(){
    

// Admin All Route
    Route::controller(AdiminController::class)->group(function(){
        Route::get('/admin/logout','destroy')->name('admin.logout');
        Route::get('/admin/profile','profile')->name('admin.profile');
        Route::get('/edit/profile','Editprofile')->name('edit.profile');
        Route::post('/store/profile','storeprofile')->name('store.profile');
        Route::get('/change/password','changepassword')->name('change.password');
        Route::post('/update/password','updatepassword')->name('update.password');
    });
    // HomeSlider All route
    Route::controller(HomeSliderController::class)->group(function(){
        Route::get('/home/slide','HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');

    });
    // AboutPage All route
    Route::controller(AboutController::class)->group(function(){
        Route::get('/about/page','AboutPage')->name('about.page');
        Route::post('/about/page','UpdateAbout')->name('update.about');
        Route::get('/about','HomeAbout')->name('home.about');
        Route::get('/about/mult/image','AboutMultImage')->name('about.mult.image');
        Route::post('/store/mult/image','StoreMultImage')->name('store.mult.image');
        Route::get('/all/mult/image','AllMultImage')->name('all.mult.image');
        Route::get('/edit/mult/image/{id}','EditMultImage')->name('edit.mult.image');
        Route::post('/update/mult/image/','UpdateMultImage')->name('update.mult.image');
        Route::get('/delete/mult/image/{id}','DeleteMultImage')->name('delete.mult.image');


    });
    // Portifolio All route
    Route::controller(PortifolioController::class)->group(function(){
        Route::get('/all/portifolio','AllPortfolio')->name('all.portifolio');
        Route::get('/add/portifolio','AddPortfolio')->name('add.portifolio');
        Route::post('/store/portifolio','StorePortfolio')->name('store.portfolio');
        Route::get('/edit/portifolio/{id}','EditPortfolio')->name('edit.portfolio');
        Route::post('/update/portifolio','UpdatePortfolio')->name('update.portfolio');
        Route::get('/delete/portifolio/{id}','DeletePortfolio')->name('delete.portfolio');
        Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');

       

    });
});

require __DIR__.'/auth.php';