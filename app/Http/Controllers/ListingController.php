<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index()
    {
        // $var = 'test var';
        $listings = Listing::all(); // select * from listings
        // $users = User::all();

        return view('listings.index', compact(['listings']));
    }

    public function show(Listing $listing)
    {

        // $listing = Listing::find($id); // select * from listings where id = $id

        // // dd($listing);

        // if(!$listing)
        //     abort(404);

        return view('listings.show', compact(['listing']));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //     $myData =[
        //     "_token" => "4qsE9nV8Do7vRI4qQXHleQCVYNCNwe8iyzmQqCre",
        //     "company" => "asdfasdf",
        //     "title" => "asdfasd",
        //     "location" => "fasdfa",
        //     "email" => "sdfasd",
        //     "website" => "fasdf",
        //     "tags" => "adsfasd",
        //     "description" => "fadfadf"
        //   ]
        $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listing::create($request->all());

        return back();
    }

    public function edit(Listing $listing)
    {
        // ['listing' => $listing];
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        // request()
        $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $listing->update($request->all());

        return back();

    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
    }
}