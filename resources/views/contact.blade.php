<x-header />

<section class="relative bg-gray-800 text-white py-10">
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/house1.jpeg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
  </div>
  <div class="container mx-auto text-center relative z-10">
    <h1 class="text-3xl sm:text-4xl lg:text-4xl font-bold leading-tight mb-6">
      Contact Us
    </h1>
    <p class="text-lg sm:text-xl mb-8">
      Have any questions or need assistance? Reach out to us today and we'll provide the support you need. We're just a message or call away.
    </p>
    <a href="#contact" class="px-4 py-2 text-md font-semibold bg-blue-500 text-white rounded-md shadow-lg hover:bg-blue-600 transition duration-300">
      Lets talk
    </a>
  </div>
</section>


<div class="max-w-screen-xl mx-auto px-4 py-12" id="contact">
  <section class="flex flex-col lg:flex-row items-center lg:space-x-16 space-y-12 lg:space-y-0">
      <!-- Contact Form -->
      <div class="flex-1 space-y-6">
          <h2 class="text-3xl font-semibold text-gray-900 mb-6">Get in Touch</h2>
          <p class="text-lg text-gray-600 mb-6">We would love to hear from you! Whether you have questions, feedback, or just want to say hello, feel free to reach out.</p>

          <form action="{{ route('submit') }}" method="POST" class="space-y-4 p-4 bg-slate-50">

            @if(session('status'))
              <div class="alert alert-success" id="status">{{ session('status') }}</div>

              <script>
                setTimeout(() => {
                  document.getElementById('status').style.display = 'none';
                }, 5000);
              </script>
            @endif

            @csrf
            <div>
              <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
              <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-green-200" value="{{ old('name') }}" >
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div>
              <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-green-200" value="{{ old('email') }}" >
              @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div>
              <label for="message" class="block text-lg font-medium text-gray-700">Your Message</label>
              <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-green-200" >{{ old('message') }}</textarea>
              @error('message') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          
              <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-800 focus:outline-none focus:ring-1 focus:ring-green-200">Send Message</button>
          </form>
      </div>

      <!-- Location Map -->
      <div class="flex-shrink-0 w-full lg:w-1/2">

        
          <div class="w-full h-80 bg-gray-300 rounded-lg shadow-lg" id="map">
              {{-- <iframe class="w-full h-full rounded-lg" allowfullscreen="" loading="lazy"></iframe> --}}
          </div>
      </div>
  </section>
</div>

<x-testimonial />


<x-footer />