<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

          <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!-- Styles -->
        <style>
            .footer-section {
background-color: #2c3e50; /* Dark background for contrast */
color: #fff;
padding: 60px 0;
}

.footer-section h3 {
font-size: 1.5rem;
margin-bottom: 20px;
font-weight: bold;
}

.footer-links {
list-style: none;
padding-left: 0;
}

.footer-links li {
margin: 10px 0;
}

.footer-links a {
color: #fff;
text-decoration: none;
font-size: 1rem;
transition: color 0.3s ease;
}

.footer-links a:hover {
color: #f39c12; /* Golden color on hover */
}

/* Subscribe Form Styling */
.subscribe-form input {
width: 100%;
padding: 10px;
margin-right: 10px;
border: none;
border-radius: 5px;
font-size: 1rem;
margin-bottom: 20px;
}

.subscribe-form button {
background-color: #f39c12;
color: #fff;
border: none;
padding: 10px 20px;
font-size: 1rem;
border-radius: 5px;
cursor: pointer;
}

.subscribe-form button:hover {
background-color: #e67e22;
}

/* Footer Bottom */
.footer-bottom {
padding: 20px 0;
margin-top: 20px;
}

.footer-bottom p {
font-size: 1rem;
margin-bottom: 10px;
}

.social-icons {
display: flex;
justify-content: center;
gap: 20px;
}

.social-icons .social-icon {
font-size: 1.5rem;
color: #fff;
transition: color 0.3s ease;
}

.social-icons .social-icon:hover {
color: #f39c12;
}

/* Responsive Design */
@media (max-width: 768px) {
.footer-section .row {
flex-direction: column;
align-items: center;
}

.footer-section h3 {
text-align: center;
}

.footer-bottom p {
text-align: center;
}
}
        </style>


    </head>
    <body>

        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="">
                                <!-- <h1 class="font-semibold text-xl text-gray-800 leading-tight">Real Estate</h1> -->
                                 <img src="{{asset('img/real-estate-logo.png')}}" class="w-20 h-20" alt="logo">
                            </a>
                        </div>
                
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-lg">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('listing')" :active="request()->routeIs('listing')">
                                {{ __('Listing') }}
                            </x-nav-link>
                            <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                {{ __('About') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                                {{ __('Contact') }}
                            </x-nav-link>
                        </div>
                    </div>
        
                    <!-- Right-aligned Auth Buttons -->
                    <div class="items-center space-x-2 ml-auto sm:flex hidden">
                        @if (Route::has('login'))
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm mx-2">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Register</a>
                                @endif
                            @endauth
                        @endif
                        
                    </div>
        
                    <!-- Hamburger (Mobile) -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        
            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('listing')" :active="request()->routeIs('listing')">
                        {{ __('Listing') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('manage_land')">
                        {{ __('About') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-responsive-nav-link>
                    
        
                    <!-- Auth Buttons in Mobile View -->
                    <div class="flex justify-end space-x-2 pt-2">
                         @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm mx-2">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        
        
        