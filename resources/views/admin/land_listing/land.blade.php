<x-admin-app>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          @if(session('status'))
          <div class="alert alert-success" id="status">{{ session('status') }}</div>

          <script>
            setTimeout(() => {
              document.getElementById('status').style.display = 'none';
            }, 5000);
          </script>
          @endif

          <div class="card">
            <div class="card-header">
              <h4>LANDS
                <a href="{{ route('add.land') }}" class="btn btn-primary float-end">Add Land</a>
              </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x: auto;">
                @if($listings->isEmpty())
                  <!-- If there are no listings, display this message -->
                  <div class="alert alert-warning">
                    No land listings available.
                  </div>
                @else
                  <!-- If there are listings, display the table -->
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
                              <img src="{{ asset($listing->images) }}" alt="" style="width: 70px; height:70px;">
                            </td>
                            <td>
                              <a href="{{ url('admin/dashboard/land/'.$listing->id .'/edit') }}" class="text-success m-2">Edit</a>
                              <a href="{{ url('admin/dashboard/land'.$listing->id .'/delete') }}" class="text-danger m-1" onclick="return confirm('Are you sure you want to delete this listing?')">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                    <tfoot>
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
              </div>
              <div>
                <!-- Laravel pagination links -->
                {{ $listings->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-admin-app>
