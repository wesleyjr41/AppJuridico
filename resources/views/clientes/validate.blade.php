@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Clientes</h3>
                </div>

            </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
                 {{ session('notification') }}
            </div>
            @endif
        </div>
        <div class="table-responsive">
            <div class="container">
                <div class="form-group form-group-sm">
                <form action="{{ url('clientes/validate')}}" method="POST">
                    @csrf

                    <div class="input-group text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">#</span>
                        </div>
                        <input type="text" name="cedula" class="form-control col-sm-10" placeholder="Cedula" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary btn-outline-primary mt-5">Validar</button>
                    </div>
                </form>
                
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
