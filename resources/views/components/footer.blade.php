<footer class="footer-section">
  <div class="container">
      <div class="row">
          <!-- About Section -->
          <div class="col-lg-4 col-md-6">
              <h3>About Us</h3>
              <p>We provide the best real estate solutions for your needs. Whether you're buying, selling, or renting, we are here to help.</p>
              <ul class="footer-links">

                <li class="flex items-center"><a href="{{ route('admin.login') }}" class="my-2">Admin<i class="fa fa-angle-right px-2 py-1 ml-2 bg-white" aria-hidden="true" style="border-radius: 50%; color:black;"></i></a></li>

          </div>
          <!-- Quick Links Section -->
          <div class="col-lg-4 col-md-6">
              <h3>Quick Links</h3>
              <ul class="footer-links">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Properties</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">About</a></li>
                  
              </ul>
          </div>
          <!-- Newsletter Subscription Form -->
          <div class="col-lg-4 col-md-6">
              <h3>Subscribe for News</h3>
              <p class="pb-2">Stay updated with the latest properties and market trends!</p>
              <form action="#" method="POST" class="subscribe-form">
                  <input type="email" name="email" placeholder="Enter your email" required>
                  <button type="submit">Subscribe <span class="angle_arrow" style="background-color: whitesmoke;border-radius:50%;"><i class="fa fa-angle-right" aria-hidden="true" style="padding: 7px;color:black;"></i></span></button>
              </form>
          </div>
      </div>
      <div class="row footer-bottom">
          <div class="col-12 text-center">
              <p>&copy; 2024 Real Estate Company. All rights reserved.</p>
              <div class="social-icons">
                  <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
      </div>
  </div>
  </footer>



  <script type="module">
    import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'
  
    const keenSlider = new KeenSlider(
      '#keen-slider',
      {
        loop: true,
        slides: {
          origin: 'center',
          perView: 1.25,
          spacing: 16,
        },
        breakpoints: {
          '(min-width: 1024px)': {
            slides: {
              origin: 'auto',
              perView: 1.5,
              spacing: 32,
            },
          },
        },
      },
    //   []
    )
  
    const keenSliderPrevious = document.getElementById('keen-slider-previous')
    const keenSliderNext = document.getElementById('keen-slider-next')
  
    const keenSliderPreviousDesktop = document.getElementById('keen-slider-previous-desktop')
    const keenSliderNextDesktop = document.getElementById('keen-slider-next-desktop')
  
    keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
    keenSliderNext.addEventListener('click', () => keenSlider.next())
  
    keenSliderPreviousDesktop.addEventListener('click', () => keenSlider.prev())
    keenSliderNextDesktop.addEventListener('click', () => keenSlider.next())
  </script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
    // Initialize the map
    var map = L.map('map').setView([9.0425, 7.2975], 12); // Centering to latitude/longitude

    // Add OpenStreetMap tiles as the base layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Adding a marker to the map
    L.marker([7.2975, 7.2975]).addTo(map)
        .bindPopup('A sample marker!')
        .openPopup();
    </script>

  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>