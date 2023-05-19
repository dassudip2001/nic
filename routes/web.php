<?php

use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemGroup\ItemGroupController;
use App\Http\Controllers\ProfileController;
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
Route::get('/item-group', [ItemGroupController::class, 'index'])->name('item-group.index');
Route::post('/item-group', [ItemGroupController::class, 'create'])->name('item-group.create');
Route::get('/item-group/{id}', [ItemGroupController::class, 'show'])->name('item-group.show');
Route::put('/item-group/{id}', [ItemGroupController::class, 'update'])->name('item-group.update');
Route::get('/item-group/{id}', [ItemGroupController::class, 'destroy'])->name('item-group.destroy');


// Item 

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::post('/item', [ItemController::class, 'create'])->name('item.create');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
Route::Put('/item/{id}', [ItemController::class, 'update'])->name('item.update');
Route::get('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');


// expenditure

Route::get('/expenditure', [ExpenditureController::class, 'index'])->name('expenditure.index');
Route::post('/expenditure', [ExpenditureController::class, 'create'])->name('expenditure.create');
Route::get('/expenditure/{id}', [ExpenditureController::class, 'show'])->name('expenditure.show');
Route::Put('/expenditure/{id}', [ExpenditureController::class, 'update'])->name('expenditure.update');
Route::get('/expenditure/{id}', [ExpenditureController::class, 'destroy'])->name('expenditure.destroy');

require __DIR__ . '/auth.php';