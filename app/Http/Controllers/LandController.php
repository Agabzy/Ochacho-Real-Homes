<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class LandController extends Controller
{
    public function manageLand(){
        // Get the user's properties
        $houseRecords = Listing::where('user_id', auth()->id())->where('category', 'land')->paginate(5);
        return view('admin.land_listing.land', ['listings' => $houseRecords]);
    }

    public function addLand(){
        return view('admin.land_listing.create');
    }

    public function storeLand(Request $request){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'price' => 'required|numeric',
            'location' => 'required|max:100|string',
            'land_size' => 'required|integer',
            'category' => 'required|in:house,land',
            'image' => 'required|mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/lands/';
            $file->move($path, $filename);
        }

        // Create the property and associate with the authenticated user
        Listing::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'land_size' => $request->land_size,
            'category' => $request->category,
            'images' => $path . $filename,
            'user_id' => auth()->id(),  // Associate the property with the authenticated user
        ]);

        return redirect()->back()->with('status', 'New Land added successfully!');
    }

    public function editLand($id){
        // Only allow users to edit their own listings
        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('admin.land_listing.edit', compact('listing'));
    }

    public function updateLand(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'land_size' => 'required|numeric',
            'category' => 'required|in:house,land',
            'images' => 'nullable|mimes: jpg, png,jpeg,webp',
        ]);

        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $path = 'uploads/lands/';
        $filename = basename($listing->images);

        if ($request->has('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path($path), $filename);

            // Delete old image if it exists
            if (File::exists(public_path($listing->images))) {
                File::delete(public_path($listing->images));
            }
        }

        $listing->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'category' => $request->category,
            'land_size' =>$request->land_size,
            'images' => $path . $filename,
        ]);

        return redirect()->back()->with('status', 'Land updated successfully!');
    }

    public function destroyLand($id){
        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if (File::exists(public_path($listing->images))) {
            File::delete(public_path($listing->images));
        }

        $listing->delete();

        return redirect()->back()->with('status', 'Land deleted successfully!');
    }
}
