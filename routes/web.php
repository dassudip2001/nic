<?php

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
Route::get('/item-group', [ItemGroupController::class, 'show'])->name('item-group.show');
Route::put('/item-group', [ItemGroupController::class, 'update'])->name('item-group.update');
Route::get('/item-group', [ItemGroupController::class, 'destroy'])->name('item-group.destroy');



require __DIR__ . '/auth.php';
