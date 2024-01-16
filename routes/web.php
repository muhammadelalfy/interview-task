<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Http;
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


//task
Route::resource('/users', UserController::class);
Route::get('/search', [UserController::class, 'search'])->name('user.search');
Route::get('/search-countries', [CountryController::class, 'search'])->name('country.search');

Route::get('/api-countries', [CountryController::class, function () {
    $country_code = auth()->user()->country->code;
    $response = Http::get(

        'http://api.weatherapi.com/v1/current.json?key=54a624731e7a487b9f7105124220307&q='
        . $country_code .' on&aqi=no');

    dd($response->json());
}]);

require __DIR__ . '/auth.php';
