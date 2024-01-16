<?php

namespace App\Livewire;

use App\Models\Ciudades;
use App\Models\Provincias;
use Livewire\Component;

class Assigment extends Component
{
    public $states;
    public $cities = [];

    public $stateId;
    public $cityId;

    protected $rules = [
        'provincia' => 'required',
        'ciudad' => 'required',
    ];

    public function mount()
    {   
        
        $this->states = Provincias::all();
        $this->cities = collect();
    }


    public function updatedStateId($value)
    {
        $this->cities = Ciudades::where('provincia_id', $value)->get();
    }

    public function render()
    {
        return view('livewire.assigment');
    }
}
