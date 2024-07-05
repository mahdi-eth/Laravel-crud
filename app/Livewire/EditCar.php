<?php

namespace App\Livewire;

use App\Models\Car; //import car model..
use Livewire\Component;

class EditCar extends Component
{
    public $is_flash_showing = false; //assign this value an initial value of false..
    public $car_id;
    public Car $car_data;
    public $car_name;
    public $brand;
    public $capacity;
    public $fuel_type;
    // use mount function to recieve the id and fetch the specific car details from db
    public function mount($id){
        // here i forgot to assign the $id to our public car_id
        $this->car_id = $id;

        $this->car_data = Car::where('id',$id)->first();
        // assign these varibles car details from db at first
        $this->car_name = $this->car_data->car_name;
        $this->brand = $this->car_data->brand;
        $this->capacity = $this->car_data->engine_capacity;
        $this->fuel_type = $this->car_data->fuel_type;
        // if so no need to pass $car_data->car_name in your form.. lets change this...
    }
    // create update function here..
    public function update(){
        // in order for this to work we need to declare variables and bind them from our form models
        $this->validate([
            'car_name' => 'required',
            'brand' => 'required',
            'capacity' => 'required',
            'fuel_type' => 'required',
        ]);

        // now edit car details here
        try {
            Car::where('id',$this->car_id)->update([
                'car_name' => $this->car_name,
                'brand' => $this->brand,
                'engine_capacity' => $this->capacity,
                'fuel_type' => $this->fuel_type,
            ]);
            $this->is_flash_showing = true;
            // redirect to car_list page
            // $this->redirect('/cars',navigate:true);
        } catch (\Exception $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.edit-car');
    }
}
