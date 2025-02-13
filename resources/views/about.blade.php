<x-header />


<section class="relative bg-gray-800 text-white py-10">
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/house1.jpeg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
  </div>
  <div class="container mx-auto text-center relative z-10">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-6">
      About Us
    </h1>
    <p class="text-lg sm:text-xl mb-8">
      At <span class="font-bold italic">Real Estate</span>, we believe that everyone deserves a place to call home.</p>   
      <a href="{{ route('contact') }}" class="px-4 py-2 text-md font-semibold bg-blue-500 text-white rounded-md shadow-lg hover:bg-blue-600 transition duration-300">
      Get in Touch
    </a>
  </div>
</section>

<div class="max-w-screen-xl mx-auto px-4 py-12">
  <section class="flex flex-col lg:flex-row items-center lg:space-x-16 space-y-12 lg:space-y-0">
      <!-- Image -->
      <div class="flex-shrink-0 w-full lg:w-1/2">
          <img src="img/house1.jpeg" alt="About Us Image" class="w-full rounded-lg shadow-lg">
      </div>
      <!-- Content -->
      <div class="flex-1 text-center lg:text-left">
          <h2 class="text-3xl font-semibold text-gray-900 mb-6">About Our Company</h2>
          <p class="text-lg text-gray-600 mb-6">"At <span class=" italic font-bold">Real Estate,</span>we’re dedicated to helping you find the perfect home or investment. With years of real estate experience, our expert team offers personalized service to guide you through every step of the process. Whether buying, selling, or renting, we're here to make your journey smooth and successful."</p>

          <h3 class="text-2xl font-medium text-gray-800 mb-4">Our Mission</h3>
          <p class="text-lg text-gray-600 mb-6">"<span class="font-bold italic">Our mission</span>, is to provide exceptional real estate services that create lasting value for our clients. We prioritize strong relationships and dedicated support to ensure your success in every transaction."</p>

          <h3 class="text-2xl font-medium text-gray-800 mb-4">Our Values</h3>
            <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-2 text-lg text-gray-600">
              <li class="flex items-start">Integrity</li>
              <li class="flex items-start">Innovation</li>
              <li class="flex items-start">Customer Satisfaction</li>
              <li class="flex items-start">Excellence</li>
              <li class="flex items-start">Transparency</li>
              <li class="flex items-start">Commitment</li>
            </ul>
            
      </div>
  </section>
</div>

<x-our-team />

<x-why-choose-us />


<x-footer />