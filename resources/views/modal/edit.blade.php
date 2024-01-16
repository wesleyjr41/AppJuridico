<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        </div>
        <div class="modal-body">
          {{$cliente->id}}
          {{$cliente->profiles->nombres}}
          {{$cliente->profiles->apellidos}}
          {{$cliente->profiles->identificacion}}
          {{$cliente->profiles->fecha_nacimiento}}
          {{$cliente->profiles->edad}}
          {{$cliente->profiles->telefono}}
          {{$cliente->profiles->genero_id}}
          {{$cliente->profiles->nombres}}

        </div>
      </div>
    </div>
  </div>