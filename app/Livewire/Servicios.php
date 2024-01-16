<?php

namespace App\Livewire;

use App\Models\Linea_servicios;
use App\Models\Materias;
use App\Models\Servicios as ModelsServicios;
use Livewire\Component;

class Servicios extends Component
{
    public $materias;
    public $lineas;
    public $servicios = [];

    public $lineaId;
    public $servicioId;

    public function mount()
    {   
        $this->lineas = Linea_servicios::all();
        $this->materias = Materias::all();
        $this->servicios = collect();
    }

    public function updatedLineaId($value)
    {
        $this->servicios = ModelsServicios::where('categoria_servicios_id', $value)->get();
        //dd($this->states);
    }

    public function render()
    {
        return view('livewire.servicios');
    }
}
