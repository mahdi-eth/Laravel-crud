<?php

namespace App\Livewire;

use Livewire\Component;

class TestPage extends Component
{
    // this act as our controller in normal Laravel
    public function render()
    {
        return view('livewire.test-page');
    }
}
