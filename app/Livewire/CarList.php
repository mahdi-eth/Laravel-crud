<?php

namespace App\Livewire;

use App\Models\Car; //import this
use Livewire\Component;

class CarList extends Component
{
    public $all_cars;

    public function mount(){
        $this->all_cars = Car::all(); //here we get all cars from db and asign to all cars variable..
    }
    public function delete($id){
        try {
            Car::where('id',$id)->delete();
            return $this->redirect('/cars',navigate:true); 
        } catch (\Exception $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.car-list',[
            'cars' => $this->all_cars
        ]);
    }
}
