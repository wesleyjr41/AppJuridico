<?php

namespace App\Http\Controllers;


use App\Models\Ciudades;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCities($provincia)
    {
        $ciudades = Ciudades::where('provincia_id', $provincia)->get();
        return response()->json($ciudades);
    }

    public function getServicios($linea_servicios)
    {
        $servicios = Servicios::where('categoria_servicios_id', $linea_servicios)->get();
        return response()->json($servicios);
    }
}
