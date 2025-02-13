<?php

namespace App\Http\Controllers;
use App\Models\Listing;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){
        $items = Listing::latest()->where('category', 'house')->take(3)->with('user')->get();
        return view('welcome', compact('items'));
    }
    // public function listing(){
    //     $total = Listing::count();
    //     $listings = Listing::paginate(2);
    //     $categories = Listing::select('category')->distinct()->get();
    //     $recentProperties = Listing::orderBy('created_at', 'desc')->take(5)->get();
    //     return view('listing',compact('listings','total','categories','recentProperties'));
    // }
    public function listing(Request $request) {
        $query = Listing::query();
        $latest = Listing::orderBy('created_at', 'desc')->take(5)->get();
    
        // Check if a category is selected
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }
    
        $listings = $query->orderBy('created_at', 'desc')->paginate(3); // Paginate results
        $total = $listings->total(); // Get total listings after filtering
        $categories = Listing::select('category')->distinct()->get();
    
        // Fetch recent properties based on the selected category
        // $recentProperties = Listing::where('category', $request->category)
        //     ->orderBy('created_at', 'desc')
        //     ->take(5)
        //     ->get();
        $recentProperties = Listing::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    
        return view('listing', compact('listings', 'total', 'categories', 'recentProperties'));
    }
    
    

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function submit(Request $request){
        $request->validate([
            'name' => 'required|max:100|string',
            'email' => 'required|email',
            'message' => ['required', 'regex:/^[a-zA-Z0-9\s\.,!?\'"()]*$/'],
        ]);
        return redirect()->back()->with('status', 'Message sent successfully');
    }

    public function showDetails($id){
        $item = Listing::where('id', $id)->get();
        return view('details', ['items' => $item]);
    }

    public function inquire(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'message' => 'nullable|max:255|string',
        ]);

        // Handle form submission logic (like saving the inquiry or sending an email)
        // Assuming everything goes well, redirect back with a success message
        return redirect()->route('details', ['id' => $id])->with('status', 'Thanks for your inquiry! We will get back to you soon.');
    }

    // public function filterForm(Request $request) {
    //     $query = Listing::query();
    //     $categories = Listing::select('category')->distinct()->get();
    //     $recentcatProperties = collect(); // Initialize empty collection
    //     $totalcatProperties = 0;
    
    //     if ($request->has('category') && !empty($request->category)) {
    //         $query->where('category', $request->category);
    
    //         $totalcatProperties = $query->count();
    //         $recentcatProperties = Listing::where('category', $request->category)->latest()->take(5)->get();
    //     }
    
    //     $categoryListing = $query->get();
    
    //     return view('partial.listing-items', compact('categoryListing', 'recentcatProperties', 'totalcatProperties', 'categories'))->render();
    // }

    public function filterForm(Request $request) {
        dd($request->all()); // Check if 'category' is received
    }
    }
