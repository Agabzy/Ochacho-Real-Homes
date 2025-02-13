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
                <h4>EDIT HOUSE
                  <a href="{{ route('manage.house') }}" class="btn btn-primary float-end">Back</a>
                </h4>
              </div>
              <div class="card-body">
                 <form action="{{ url('admin/dashboard/house/'.$listing->id.'/update') }}" method="POST"   enctype="multipart/form-data">

                  @csrf
                  @method('PUT')

                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $listing->name }}" placeholder="Enter name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="description">Description</label>
                        <input type="text" id="description" class="form-control" name="description" value="{{ $listing->description }}" placeholder="Enter description">
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="price">Price</label>
                        <input type="text" id="price" class="form-control" name="price" value="{{ $listing->price }}" placeholder="Enter price">
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="location">Location</label>
                        <input type="text" id="location" class="form-control" name="location" value="{{ $listing->location }}" placeholder="Enter location">
                        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name="category">
                          <option value="{{ $listing->category }}">{{ $listing->category }}</option>
                          <option value="house" {{ old('category') == 'house' ? 'selected' : '' }}>House</option>
                          <option value="land" {{ old('category') == 'land' ? 'selected' : '' }}>Land</option>
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="land_size">Land Size</label>
                        <input type="text" id="land_size" class="form-control" name="land_size" value="{{ $listing->land_size }}" placeholder="Squarefeet">
                        @error('land_size') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="bedrooms">Bedrooms</label>
                        <input type="number" id="bedrooms" class="form-control" name="bedrooms" value="{{ $listing->bedrooms }}" placeholder="Enter number of bedrooms">
                        @error('bedrooms') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="number" id="bathrooms" class="form-control" name="bathrooms" value="{{ $listing->bathrooms }}" placeholder="Enter number of bathrooms">
                        @error('bathrooms') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="garage">Garage</label>
                        <input type="number" id="garage" class="form-control" name="garage" value="{{$listing->garage }}" placeholder="Enter number of garages">
                        @error('garage') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="furnished">Furnished</label>
                        <select id="furnished" class="form-control" name="furnished">
                          <option value="{{ $listing->furnished }}">{{ $listing->furnished }}</option>
                          <option value="1" {{ old('furnished') == '1' ? 'selected' : '' }}>True</option>
                          <option value="0" {{ old('furnished') == '0' ? 'selected' : '' }}>False</option>
                        </select>
                        @error('furnished') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="heating">Heating</label>
                        <input type="text" id="heating" class="form-control" name="heating" value="{{ $listing->heating }}" placeholder="Enter heating type">
                        @error('heating') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="cooling">Cooling</label>
                        <input type="text" id="cooling" class="form-control" name="cooling" value="{{ $listing->cooling }}" placeholder="Enter cooling type">
                        @error('cooling') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="pool">Pool</label>
                        <select id="pool" class="form-control" name="pool">
                          <option value="{{ $listing->pool }}">{{ $listing->pool }}</option>
                          <option value="1" {{ old('pool') == '1' ? 'selected' : '' }}>True</option>
                          <option value="0" {{ old('pool') == '0' ? 'selected' : '' }}>False</option>
                        </select>
                        @error('pool') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  
                      <div class="col-md-6 mb-3">
                        <label for="flooring_type">Flooring Type</label>
                        <input type="text" id="flooring_type" class="form-control" name="flooring_type" value="{{ $listing->flooring_type }}" placeholder="Enter flooring type">
                        @error('flooring_type') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="lot_size">Lot Size</label>
                        <input type="text" id="lot_size" class="form-control" name="lot_size" value="{{ $listing->lot_size }}" placeholder="Enter lot size">
                        @error('lot_size') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="image">Image</label>
                        @if($listing->images)
                          <img src="{{ asset($listing->images) }}" alt="Current Image" class="img-thumbnail" width="100">
                        @endif
                        <input type="file" id="image" class="form-control" name="images">
                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>

                    </div>
                  </div>
                  
    
                  <div class="mb-3">
                   <button type="submit" class="btn btn-success">Save</button>
                  </div>
    
                 </form>
              </div>
            </div>
          </div>
        </div>
       </div>


</x-admin-app>
