<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     // dd($request);
//     // dd(request());
//     return view('test');
// });

// Index
Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Show
Route::get('/listings/{listing}', [ListingController::class, 'show']);


Route::get('/phones', function () {
    $users = User::with('phone')->find(3);
    // $users = User::with('phone')->where('user_id', 3)->get();

    // $posts = Phone::with('user')->get();

    return response()->json($users);
});

Route::get('/users/{user}/posts', function (User $user) {
    // $users = User::with('listings')->withCount('listings')->find(1);
    $user->load('listings')->loadCount('listings')->get();
    // $listings = Listing::with('user')->get();

    return response()->json($user);
});

// Route::get('/users/{id}', function ($id) {
//     return $id;
// })->where('id','[0-9]+');

// Route::get('/users/posts/asdfas/dafsdf', function ($id) {
//     return $id;
// })->name('user');

// <a href="/users/posts/asdfas/dafsdf">Click</a>
// <a href="{{ route('user') }}">Click</a>
