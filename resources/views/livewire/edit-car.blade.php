<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>Laravel 11.x + Livewire 3.x CRUD</h2>
                </div>
                <div class="col">
                    <a href="/cars" wire:navigate class="btn btn-primary btn-sm float-end">Car List</a>
                </div>
            </div>
              
        </div>
        <div class="card-body">
            {{-- here we will show our error or success message --}}
            @if ($is_flash_showing == true)
                <span class="alert alert-success p-2">successfully updated car.</span>
            @endif
            <form wire:submit="update"> 
                {{-- saveCar is the function that will save our car to database. let's create this --}}
            <div class="mb-3">
                <label for="name" class="form-label">Car Name</label>
                <input type="text" wire:model="car_name" class="form-control" id="car_name" name="car_name" placeholder="Enter car name" value="{{$car_name}}">
                Characters Left:<span x-text="10 - $wire.car_name.length"></span>
                @error('car_name')
                    {{-- here we show validation error --}}
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
              <div class="mb-3">
                <label for="brand" class="form-label">Car Brand</label>
                <input type="text"  wire:model="brand" class="form-control" id="brand" name="brand" placeholder="Enter car brand" value="{{$brand}}">
                @error('brand')
                    {{-- here we show validation error --}}
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
              <div class="mb-3">
                <label for="capacity" class="form-label">Engine Capacity</label>
                <input type="number" wire:model="capacity" class="form-control" id="capacity" name="capacity" placeholder="Enter car Engine capacity" value="{{$capacity}}">
                @error('capacity')
                    {{-- here we show validation error --}}
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
              <div class="mb-3">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select name="fuel_type" wire:model="fuel_type" id="fuel_type" class="form-select">
                        <option value="{{$fuel_type}}">{{$fuel_type}}</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Electricity">Electricity</option>
                    </select>
                    @error('fuel_type')
                    {{-- here we show validation error --}}
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-success">update</button>

            </form>
        </div>
    </div>
</div>
