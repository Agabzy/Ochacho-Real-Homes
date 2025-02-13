<x-header />

<!-- Card 1 -->
<div class="max-w-7xl mx-auto p-5 overflow-x-hidden">
    <!-- Property Detail Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center">

        <!-- Image Gallery Section -->
        @foreach ($items as $item)
        <div class="space-y-4">
            <div class="relative">
                <img class="w-full h-96 object-cover rounded-xl" src="{{ asset($item->images) }}" alt="{{ $item->name }}">
            </div>
            <!-- Add additional images if available -->
            <div class="grid grid-cols-3  gap-4">
                <img class="md:w-full h-32 object-cover rounded-xl" src="{{ asset($item->images) }}" alt="Additional Image 1">
                <img class="md:w-full h-32 object-cover rounded-xl" src="{{ asset($item->images) }}" alt="Additional Image 2">
                <img class="md:w-full h-32 object-cover rounded-xl" src="{{ asset($item->images) }}" alt="Additional Image 3">
            </div>
        </div>

        <!-- Property Details Section -->
        <div class="space-y-6">
            <h1 class="text-3xl font-semibold text-gray-900">{{ $item->name }}</h1>
            <p class="text-xl text-green-700 font-bold">${{ number_format($item->price) }}</p>

            <div class="flex items-center space-x-4 text-gray-600">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500">
                        <path fill="currentColor" d="M12 3v18m9-9H3"></path>
                    </svg>
                    <span>{{ $item->location }}</span>
                </div>

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500">
                        <path fill="currentColor" d="M21 12c0 4.75-3.93 8.62-8.75 8.62S3.5 16.75 3.5 12 7.43 3.38 12.25 3.38c4.82 0 8.75 3.87 8.75 8.62z"></path>
                    </svg>
                    <span>{{ $item->bedrooms }} Bedrooms, {{ $item->bathrooms }} Bathrooms</span>
                </div>
            </div>

            <p class="text-lg text-gray-800">{{ $item->description }}</p>

            <!-- Features Section -->
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-6 text-gray-600">
                <div>
                    <h2 class="font-semibold">Property Features</h2>
                    <ul class="list-inside list-disc">
                        <li>Land Size: {{ number_format($item->land_size) }} sqft</li>
                        <li>Lot Size: {{ number_format($item->lot_size) }} sqft</li>
                        <li>Furnished: {{ $item->furnished ? 'Yes' : 'No' }}</li>
                        <li>Heating: {{ $item->heating }}</li>
                        <li>Cooling: {{ $item->cooling }}</li>
                        <li>Garage: {{ $item->garage ? 'Yes' : 'No' }}</li>
                        <li>Pool: {{ $item->pool ? 'Yes' : 'No' }}</li>
                    </ul>

                    <div>
                        <h2 class="font-semibold mt-3">Contact the Realtor</h2>
                        <div class="md:flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1500522144261-ea64433bbe27?ixid=MXwyMDg1fDB8MHxwaG90by1wZXJzb258ZW58fHx8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&h=750&q=80');"></div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $item->user->name }}</p>
                                <p class="text-gray-700">Phone: {{ $item->user->phone_number }}</p>
                                <p class="text-gray-700">Email: <a href="mailto:{{ $item->user->email }}" class="text-blue-500">{{ $item->user->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div >
                <!-- Inquiry Form Section -->
                <form id="booking-form" method="POST" action="{{ route('property.inquire', $item->id) }}" class="space-y-4 p-4 bg-slate-100">
        <h3 class="text-xl font-semibold text-gray-800">Book a Property Tour</h3>
        @csrf

        <!-- Name Input -->
        <div class="w-full">
            <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="w-full">
            <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Message Textarea -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Your Message (optional)</label>
            <textarea id="message" name="message" rows="2" placeholder="Tell us more about your inquiry" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <!-- Error Message (Hidden by Default) -->
        <p id="auth-error" class="text-red-500 text-sm hidden">You must be <a href="{{ route('login') }}" class="text-blue-500 underline">logged in</a> to book a tour.</p>

        <!-- Submit Button -->
        <div>
            <button type="submit" id="book-tour-btn" class="w-full px-6 py-2 text-white bg-blue-600 font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Book a Tour</button>
        </div>
    </form>
</div>
            </div>

            

        </div>
        @endforeach
    </div>
</div>




<script>
    document.getElementById('book-tour-btn').addEventListener('click', function(event) {
        let isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        
        if (!isAuthenticated) {
            event.preventDefault(); // Stop form submission
            document.getElementById('auth-error').classList.remove('hidden'); // Show error message
        }
    });
</script>
<x-footer />
