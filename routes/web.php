<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Index;
use App\Livewire\User\IndexPage;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/view_print/{id}', ViewPrintList::class)->name('view_print');
Route::middleware([
    'auth:sanctum', 'role:admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin_index', Index::class)->name('admin_index');
});

Route::middleware([
    'auth:sanctum', 'role:user',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user_index', IndexPage::class)->name('user_index');
});
