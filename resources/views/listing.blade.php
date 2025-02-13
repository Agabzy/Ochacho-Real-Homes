<x-header />

<section class="relative bg-gray-800 text-white py-10">
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/house1.jpeg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
  </div>
  <div class="container mx-auto text-center relative z-10">
    <h1 class="text-3xl sm:text-3xl lg:text-4xl font-bold leading-tight mb-6">
      Listing
    </h1>
    <p class="text-lg sm:text-xl mb-8">
      Browse through our extensive list of properties and find the perfect possession for you.
    </p>
  </div>
</section>

<section class="listing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-3">
            <div class="result-sorting-wrapper">
    <div class="sorting-count">
        <p><span>{{ $total }} Listings</span></p>
    </div>
</div>

<div id="listingsContainer">
    @if($listings->count() > 0)
        @foreach ($listings as $item)
            <div class="product-listing-m gray-bg">
                <div class="product-listing-img">
                    <img src="{{ $item->images }}" class="img-responsive" style="width: 400px;height:270px;" alt="Image" />
                </div>
                <div class="product-listing-content">
                    <h5><a href="">{{ $item->name }}</a></h5>
                    <p class="list-price mb-4 text-green-600">${{ $item->price }}</p>
                    <ul>
                        <li> Location <br><i class="fa fa-globe"></i> {{ $item->location }}</li>
                        <li> Land Size (sqft) <br><i class="fa fa-tree"></i> {{ $item->land_size }} </li>
                        <li> Category <br> <i class="fa fa-cogs"></i> {{ $item->category }} </li>
                    </ul>
                    <a href="{{ url('listing/'.$item->id.'/detail') }}" class="btn btn-primary listing_btn">
                        View Details <span class="angle_arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p>No listings found for this category.</p>
    @endif
</div>



<!-- Pagination -->
<div class="flex justify-center">
    {{ $listings->links('pagination::bootstrap-5') }}
</div>

        </div>
        <!-- Sidebar -->
        <aside class="col-md-4 col-md-pull-9">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-filter"></i> Find Your Assets</h5>
                    </div>
                    <div class="sidebar_filter">
                    <form action="{{ route('listing') }}" method="GET">
                        <div class="form-group select">
                            <select class="form-control" name="category" style="background-color: #f5f5f5" onchange="this.form.submit()">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->category }}" {{ request('category') == $item->category ? 'selected' : '' }}>
                                        {{ $item->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Assets</h5>
                    </div>
                    <div class="recent_addedproperty">
                        <ul>
                            @foreach ($recentProperties as $item)
                                <li class="gray-bg recent">
                                    <div class="recent_post_img"> <a href=""><img src="{{ $item->images }}" alt="image" style="width: 70px; height:60px"></a> </div>
                                    <div class="recent_post_title"> <a href="">{{ $item->name }}</a>
                                        <p class="widget_price text-green-600">${{ $item->price }}</p>
                                        <p class="widget_price text-black">{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </aside>
    </div>
</section>


<x-testimonial />


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorySelect').on('change', function() {
            var selectedCategory = $(this).val();
            var filterUrl = $(this).data('url'); // Get the AJAX route

            $.ajax({
                url: filterUrl,
                type: "GET",
                data: { category: selectedCategory },
                success: function(response) {
                    $('#listingsContainer').html(response); // Update listings
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<x-footer />
