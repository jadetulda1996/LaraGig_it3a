<?php

use App\Models\Listing;
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

// All listings
Route::get('/', function(){
    // $var = 'test var';
    $listings = Listing::all(); // select * from listings
    // $users = User::all();

    return view('listings', compact(['listings']));
});

// Single Listing
Route::get('/listings/{id}', function($id) {

    $listing = Listing::find($id); // select * from listings where id = $id

    // dd($listing);

    if(!$listing)
        abort(404);

    return view('listing', compact(['listing']));
});

// Route::get('/users/{id}', function ($id) {
//     return $id;
// })->where('id','[0-9]+');

// Route::get('/users/posts/asdfas/dafsdf', function ($id) {
//     return $id;
// })->name('user');

// <a href="/users/posts/asdfas/dafsdf">Click</a>
// <a href="{{ route('user') }}">Click</a>
