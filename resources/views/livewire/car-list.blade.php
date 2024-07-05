<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>Laravel 11.x + Livewire 3.x CRUD</h2>
                </div>
                <div class="col">
                    <a href="/add/new" wire:navigate class="btn btn-success btn-sm float-end">Add New</a>
                </div>
            </div>
              
        </div>
        <div class="card-body">
            
            {{-- here will pass the table for all cars with edit and delete button --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Engine Capacity</th>
                    <th scope="col">Engine Fuel Type</th>
                    <th colspan="2" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $item)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$item->car_name}}</td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->engine_capacity}}</td>
                            <td>{{$item->fuel_type}}</td>
                            <td><a href="/edit/car/{{$item->id}}" wire:navigate class="btn btn-primary btn-sm">edit</a></td>
                            <td><button class="btn btn-danger btn-sm" wire:click="delete({{$item->id}})" wire:confirm="Are you sure you want to delete this?">Delete</button></td>
                            <td><div class="spinner-grow" role="status" wire:loading wire:target="delete({{ $item->id }})">
                                {{-- <span class="visually-hidden">Loading...</span> --}}
                              </div></td>
                            {{-- wire:click this listen for click event and will call the delete function let's create this delete function --}}
                        </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
