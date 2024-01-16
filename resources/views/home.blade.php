@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>


                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="card col" style="width: 16rem">
                            <div class="card-body">
                                <h1 class="card-title">Asesorias</h1>
                                <p class="card-text "><h1 class="text-center text-primary display-2">{{ count($asesorias) }}</h1></p>
                                <a href="/asesorias" class="btn btn-primary float-right">
                                    <i class="ni ni-bold-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card col" style="width: 16rem;">
                            <div class="card-body">
                                <h1 class="card-title">Patrocinios</h1>
                                <p class="card-text "><h1 class="text-center text-primary display-2">{{ count($patrocinios) }}</h1></p>
                                <a href="/patrocinios" class="btn btn-primary float-right">
                                    <i class="ni ni-bold-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card col" style="width: 16rem;">
                            <div class="card-body">
                                <h1 class="card-title">Clientes</h1>
                                <p class="card-text "><h1 class="text-center text-primary display-2">{{ count($clientes) }}</h1></p>
                                <a href="/clientes" class="btn btn-primary float-right">
                                    <i class="ni ni-bold-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
