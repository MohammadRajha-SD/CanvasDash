<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\AddWeatherWidget;
use App\Livewire\Dashboard;


Route::get('/', function () {
    return view('home');
});
Route::middleware(['auth'])->group(function () {
    // Route Livewire
    \Livewire\Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/add-weather-widget', AddWeatherWidget::class)->name('add.weather.widget');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
