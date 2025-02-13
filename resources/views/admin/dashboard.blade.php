<x-admin-app>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="container">
  <div class="w-full">
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 my-4">
    <!-- Sales Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 relative">
      <div class="absolute top-4 right-4">
      <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
          <i class="fas fa-arrow-up-right-from-square"></i>
          </div>      </div>
      <h5 class="text-lg font-semibold">Total Users <span class="text-gray-500">| Today</span></h5>
      <div class="flex items-center mt-4">
        <div class="w-12 h-12 bg-blue-100 flex items-center justify-center rounded-full">
          <i class="fas fa-users text-blue-500 text-2xl"></i>
        </div>
        <div class="ml-4">
          <h6 class="text-2xl font-bold">{{$totaluser}}</h6>
          <span class="text-green-500 font-bold">12%</span> <span class="text-gray-500">increase</span>
        </div>
      </div>
    </div>
    <!-- Revenue Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 relative">
      <div class="absolute top-4 right-4">
      <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
          <i class="fas fa-arrow-up-right-from-square"></i>
          </div>      </div>
      <h5 class="text-lg font-semibold"> Total Houses <span class="text-gray-500">| This Month</span></h5>
      <div class="flex items-center mt-4">
        <div class="w-12 h-12 bg-green-100 flex items-center justify-center rounded-full">
          <i class="fas fa-house text-green-500 text-2xl"></i>
        </div>
        <div class="ml-4">
          <h6 class="text-2xl font-bold">{{$totalhouse}}</h6>
          <span class="text-green-500 font-bold">8%</span> <span class="text-gray-500">increase</span>
        </div>
      </div>
    </div>
    <!-- Customers Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 relative">
      <div class="absolute top-4 right-4">
         <!-- <div class="col-3"> -->
          <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
          <i class="fas fa-arrow-up-right-from-square"></i>
          </div>
                      <!-- </div> -->
      </div>
      <h5 class="text-lg font-semibold">Total Lands <span class="text-gray-500">| This Year</span></h5>
      <div class="flex items-center mt-4">
        <div class="w-12 h-12 bg-red-100 flex items-center justify-center rounded-full">
          <i class="fas fa-landmark text-red-500 text-2xl"></i>
        </div>
        <div class="ml-4">
          <h6 class="text-2xl font-bold">{{$totalland}}</h6>
          <span class="text-red-500 font-bold">12%</span> <span class="text-gray-500">decrease</span>
        </div>
      </div>
    </div>
  </div>
</div>

      <div class="row">
        <div class="col-md-12"> 
  
          <div class="card mb-4" >
            <div class="card-header">
                <h3>Listings</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x: auto;">

              @if($listings->isEmpty())
                      <!-- If there are no listings, display this message -->
                      <div class="alert alert-warning">
                        Oops! You do not have any available listing!<br>
                        Pls Navigate to the Manage houses/Lands to Continue.
                      </div>
                    @else

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>DESCRIPTION</th>
                            <th>PRICE</th>
                            <th>LOCATION</th>
                            <th>CATEGORY</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                   

                      @php
                        $id = 1;
                      @endphp 
                        @foreach ($listings as $listing)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{$listing->name}}</td>
                            <td>{{$listing->description}}</td>
                            <td>{{$listing->price}}</td>
                            <td>{{ ($listing->location) }}</td>
                            <td>{{ ($listing->category) }}</td>
                            <td>
                              <img src="{{ asset($listing->images) }}" alt="" style="width: 70px;height:70px;"></td>
                            <td>
                              <a href="{{ url('admin/dashboard/house/'.$listing->id .'/edit') }}" class="text-success m-2">Edit</a>
                              <a href="{{ url('admin/dashboard/house'.$listing->id .'/delete') }}" class="text-danger m-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="color: #666">
                      <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>PRICE</th>
                        <th>LOCATION</th>
                        <th>CATEGORY</th>
                        <th>IMAGE</th>
                        <th>ACTION</th>
                    </tr>
                    </tfoot>
                  </table>
                  @endif
                  <div>
                    <!-- Laravel pagination links -->
                    {{ $listings->links('pagination::bootstrap-5') }}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-admin-app>