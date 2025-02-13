<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/',[FrontendController::class, 'index'])->name('home');
Route::get('/listing',[FrontendController::class, 'listing'])->name('listing');
// Route::get('/filterlisting', [FrontendController::class, 'filterForm'])->name('filterListings');
Route::get('/about',[FrontendController::class, 'about'])->name('about');
Route::get('/contact',[FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/submit',[FrontendController::class, 'submit'])->name('submit');

Route::get('listing/{id}/detail', [FrontendController::class, 'showDetails'])->name('details');

Route::post('listing/{id}/detail/inquire', [FrontendController::class, 'inquire'])->name('property.inquire');






require __DIR__.'/auth.php';

require __DIR__.'/admin.auth.php';
