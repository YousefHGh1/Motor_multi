<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CommitmentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ManagementSubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\QAIntroController;
use App\Http\Controllers\ServicesMainController;
use App\Http\Controllers\ServicesSubController;
use App\Http\Controllers\SliderController;
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
Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // **************************************************************************************************************
    Route::resource('slider', SliderController::class);
    Route::resource('about_us', AboutUsController::class);
    Route::resource('mainservices', ServicesMainController::class);
    Route::resource('subservices', ServicesSubController::class);
    Route::resource('commitment', CommitmentController::class);
    Route::resource('goal', GoalController::class);
    Route::resource('footer', FooterController::class);
    Route::resource('contactus', ContactUsController::class);
    Route::resource('qaintro', QAIntroController::class);
    Route::resource('qa', QAController::class);
    Route::resource('management', ManagementController::class);
    Route::resource('submanagement', ManagementSubController::class);

    Route::get('/', function () {
        return view('welcome');
    });

});

Route::prefix('/homepage')->group(function () {
    Route::get('', [HomepageController::class, 'index'])->name('homepage.index');
    Route::get('/goals', [HomepageController::class, 'goals'])->name('homepage.goals');
    // Route::get('/engine', [HomepageController::class, 'engine'])->name('homepage.engine');
    Route::get('/engine/{id}', [ServicesSubController::class, 'show'])->name('homepage.engine');

    Route::get('/contact_us', [HomepageController::class, 'contact_us'])->name('homepage.contact_us');
    Route::get('/commitments', [HomepageController::class, 'commitments'])->name('homepage.commitments');

});
Route::get('/change-locale/{locale}', [HomepageController::class, 'changeLocale'])->name('change_locale');

require __DIR__ . '/auth.php';
