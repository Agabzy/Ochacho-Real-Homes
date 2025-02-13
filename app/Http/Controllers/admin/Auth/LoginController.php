<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\File;


class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }


    public function dashboard(){
        // Filter properties by the authenticated user
        $listing = Listing::where('user_id', auth()->id())->paginate(3);

        $totalhouse = Listing::join('users', 'listings.user_id', '=', 'users.id')
        ->where('category', 'house')
        ->count();

        $totalland = Listing::join('users', 'listings.user_id', '=', 'users.id')
        ->where('category', 'land' )
        ->count();

        $totaluser = User::count();

        return view('admin.dashboard', ['listings' => $listing,'totalland'=>$totalland,'totalhouse'=>$totalhouse,'totaluser'=>$totaluser]);
    }

    // Admin dashboard navigations and functionality methods for Houses

    

    // Admin dashboard navigations and functionality methods for Lands

    
}
