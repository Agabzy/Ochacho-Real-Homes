<x-header />

<section class="listing-page">
    <div class="container"> <!-- Use container-fluid for full-width layout -->
        <div class="row">
            <div class="col-md-8 col-md-push-3">
              <div class="listingContainer">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <p><span>{{ $totalcatProperties }} Listings</span></p>
                    </div>
                </div>
                
                @if(count($categoryListing) > 0)
                @foreach ($categoryListing as $item)
                    <div class="product-listing-m gray-bg">
                        <div class="product-listing-img">
                            <img src="{{ $item->images }}" class="img-responsive" style="width: 400px;height:270px;" alt="Image" />
                        </div>
                        <div class="product-listing-content">
                            <h5><a href="">{{ $item->name }}</a></h5>
                            <p class="list-price mb-4 text-green-600">${{ $item->price }}</p>
                            <ul>
                              <li> Location <br><i class="fa fa-globe" aria-hidden="true"></i> {{ $item->location }}</li>
                              <li>Land_size(sqft)<br><i class="fa fa-tree" aria-hidden="true"></i> {{ $item->land_size }} </li>
                                <li>Category<br> <i class="fa fa-cogs" aria-hidden="true"></i> {{ $item->category }} </li>
                            </ul>
                            <a href="{{ url('listing/'.$item->id.'/detail') }}" class="btn btn-primary sm:w-full listing_btn">View Details<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                @endforeach
            
                @else
              <p>No listings found for this category.</p>
                @endif

            </div>

            <!-- Side-Bar -->
            <aside class="col-md-4 col-md-pull-9">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your assets</h5>
                    </div>
                    <div class="sidebar_filter">
                        <form id="filterForm">
                            <div class="form-group select">
                                <select class="form-control" name="brand" style="background-color: #f5f5f5">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary mt-3 w-full"><i class="fa fa-search" aria-hidden="true"></i> Search Category</button>
                            </div> -->
                        </form>
                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Assets</h5>
                    </div>
                    <div class="recent_addedproperty">
                        <ul>
                            @foreach ($recentcatProperties as $item)
                                <li class="gray-bg recent">
                                    <div class="recent_post_img"> <a href=""><img src="{{ $item->images }}" alt="image" style="width: 70px; height:60px"></a> </div>
                                    <div class="recent_post_title"> <a href="">{{ $item->name }}</a>
                                        <p class="widget_price text-green-600">${{ $item->price }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- /Side-Bar -->
          </div>
        </div>
      </div>
      <div class="flex justify-center">
        {{ $categoryListings->links('pagination::bootstrap-5') }}
    </div>
    </section>



<x-footer />