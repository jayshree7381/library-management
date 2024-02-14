<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\BookIssuesController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/index', [BooksController::class, 'index'])->name('books.index');
    Route::resource('books', BooksController::class );
    
});


Route::get('/books/issue/create', [BookIssuesController::class, 'create'])->name('bookissues.create');
Route::post('/bookissues/issue/store', [BookIssuesController::class, 'store'])->name('bookissues.store');
Route::resource('bookissues', BookIssuesController::class );
Route::get('/books/issue/{bookissue_id}/return', [BookIssuesController::class, 'return'])->name('bookissues.return');

Route::resource('membership', MembershipController::class);



require __DIR__.'/auth.php';