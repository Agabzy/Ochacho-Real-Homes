<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    // public function index(){
    //     // Use 'with' to eager load the user relationship
    //     $items = Listing::latest()->where('category', 'house')->take(3)->with('user')->get();
    //     return view('welcome', ['items' => $items]);
    // }
    
    public function manageHouse(){
        // Get the user's properties
        $houseRecords = Listing::where('user_id', auth()->id())->where('category', 'house')->paginate(5);
        return view('admin.house_listing.houses', ['listings' => $houseRecords]);
    }

    public function addHouse(){
        return view('admin.house_listing.create');
    }

    public function storeHouse(Request $request){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'price' => 'required|numeric',
            'location' => 'required|max:100|string',
            'land_size' => 'required|integer',
            'category' => 'required|in:house,land',
            'image' => 'required|mimes:jpg,png,jpeg,webp',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'garage' => 'required|boolean',
            'furnished' => 'required|boolean',
            'heating' => 'required|max:30|string',
            'cooling' => 'required|max:30|string',
            'pool' => 'required|boolean',
            'flooring_type' => 'required|max:40|string',
            'lot_size' => 'required|integer',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/houses/';
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
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'furnished' => $request->furnished,
            'heating' => $request->heating,
            'cooling' => $request->cooling,
            'pool' => $request->pool,
            'flooring_type' => $request->flooring_type,
            'lot_size' => $request->lot_size,
            'user_id' => auth()->id(),  // Associate the property with the authenticated user
        ]);

        return redirect()->back()->with('status', 'New house added successfully!');
    }

    public function editHouse($id){
        // Only allow users to edit their own listings
        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('admin.house_listing.edit', compact('listing'));
    }

    public function updateHouse(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'land_size' => 'required|numeric',
            'category' => 'required|in:house,land',
            'images' => 'nullable|mimes: jpg, png,jpeg,webp',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|numeric',
            'garage' => 'required|boolean',
            'furnished' => 'required|boolean',
            'heating' => 'nullable|string',
            'cooling' => 'nullable|string',
            'pool' => 'required|boolean',
            'flooring_type' => 'nullable|string',
            'lot_size' => 'nullable|numeric',
        ]);

        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $path = 'uploads/houses/';
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
            'images' => $path . $filename,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'furnished' => $request->furnished,
            'heating' => $request->heating,
            'cooling' => $request->cooling,
            'pool' => $request->pool,
            'flooring_type' => $request->flooring_type,
            'lot_size' => $request->lot_size,
        ]);

        return redirect()->back()->with('status', 'House updated successfully!');
    }

    public function destroyHouse($id){
        $listing = Listing::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if (File::exists(public_path($listing->images))) {
            File::delete(public_path($listing->images));
        }

        $listing->delete();

        return redirect()->back()->with('status', 'House deleted successfully!');
    }
    

   
}
