<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
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
    $items = \App\Models\Item::all();

    return view('dashboard', ['items' => $items]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/upload', function () {
    $conditions = \App\Models\Condition::all();
    $types = \App\Models\ItemType::all();
    return view('upload', ['conditions' => $conditions, 'item_types' => $types]);
})->middleware(['auth', 'verified'])->name('upload');

Route::get('/edit/{id}', function ($id) {
    $item = \App\Models\Item::find($id);
    $conditions = \App\Models\Condition::all();
    $types = \App\Models\ItemType::all();
    return view('edit', ['edititem' => $item, 'conditions' => $conditions, 'item_types' => $types]);
})->middleware(['auth', 'verified'])->name('edit');

Route::get('/delete/{id}', function ($id) {
    $item = \App\Models\Item::find($id);

    if ($item) {
        $item->delete();
    }

    return Redirect::to('/dashboard');
})->middleware(['auth', 'verified'])->name('delete');

Route::post('/upload', [UploadController::class, 'store'])->name('upload')->middleware(['auth', 'verified']);
Route::post('/edit', [UploadController::class, 'edit'])->name('edit')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
