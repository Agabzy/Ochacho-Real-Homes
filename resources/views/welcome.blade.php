<x-header />

        <section class="hero-section">
            <!-- <video autoplay loop muted class="hero-video">
                <source src="video/hero-video.mp4" type="video/mp4">
            </video> -->
            <img src="img/hero.jpg" alt="hero-image" class="hero-img">
            <div class="hero-overlay"></div> <!-- Dark overlay -->
            <div class="hero-content">
                <h1 class="display-3 text-white">Find Your Dream Assets</h1>
                <p class="lead text-white text-2xl font-bold">Browse the best real estate listings and make your move today.</p>
                <a href="{{ route('listing') }}" class="btn btn-primary btn-md text-white mt-3 px-6 py-2 border-2 border-blue-500 font-semibold uppercase transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:border-blue-500">
                    Browse Listings
                  </a>
                  
             </div>
        </section>

        {{-- <main> --}}
            <div class="header">
                <h2 class="text-center mt-5 text-xl">Explore Our <span>Featured Properties</span></h2>
                <p class="property-description text-center">
                    Discover a wide range of homes and lands to suit every lifestyle and budget. From modern apartments in the city center to spacious family homes in peaceful neighborhoods, our listings showcase the best properties on the market.
                </p>
            </div>
            
                    
                <div class="recent-tab my-5 flex justify-center">
                    <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active">New Listings</li>
                    </ul>
                </div>
                    {{-- <div class="cards-container">
                        @foreach ($items as $item)
                        <div class="card">
                            <img src="{{ $item->images }}" alt="{{ $item->name }}" class="card-img" >
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                            </div>
                            <div class="card-footer">
                                <p>{{ $item->created_at->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                {{-- </div> --}}

                <div class="max-w-6xl mx-auto flex justify-center items-center">
                    <!-- Grid Container for 3 cards in a row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pb-6 px-3 mb-3 sm:items-center">
                        
                        @foreach ($items as $item)

                        @include('components.cards', ['item' => $item])
  
                        @endforeach

                    </div>
                </div>
                
                {{-- <x-cards />   --}}
                
                
                {{-- </div> --}}
                
                <x-our-team />
            {{-- </main> --}}
            <x-testimonial /> 
            
        <!-- Footer Section -->
   <x-footer />

