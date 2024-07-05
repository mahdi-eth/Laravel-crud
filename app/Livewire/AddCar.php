<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class AddCar extends Component
{
    // here we decrale the variables from form here..
    // declare them as public for them to be accessed on form
    // make sure their names match with those from your form
    // now bind these varibles to the form..
    public $car_name = '';
    public $brand = '';
    public $capacity = '';
    public $fuel_type = '';
    public function saveCar(){
// now we need to validate the variables from the request
        $this->validate([
            'car_name' => 'required',
            'brand' => 'required',
            'capacity' => 'required',
            'fuel_type' => 'required',
        ]);
        // since validation works fine
        // now add to database
        try {
            $new_car = new Car;
            $new_car->car_name = $this->car_name;
            $new_car->brand = $this->brand;
            $new_car->engine_capacity = $this->capacity;
            $new_car->fuel_type = $this->fuel_type;
            $new_car->save();

            return $this->redirect('/cars',navigate:true); 
            // add the last parameter it's important for not reloading the whole page..
            // and give us the way to achieve the SPA..
        } catch (\Exception $e) {
            dd($e) ;
        }

        // now try to add car..
        

    }
    public function render()
    {
        return view('livewire.add-car');
    }
}
