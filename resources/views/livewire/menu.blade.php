 
 <div>
     <!-- Heading -->
     <h6 class="navbar-heading text-muted">Ajustes del Perfil</h6>
     <!-- Navigation -->
     <ul class="navbar-nav mb-md-3">
         <li class="nav-item">
            {{--  <a class="nav-link" href="{{ url('/usuario/' . auth()->user()->id . '/edit') }}">
                 <i class="ni ni-spaceship"></i> Mi Cuenta
             </a> --}}
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ url('/usuario/' . auth()->user()->id . '/reset') }}">
                 <i class="ni ni-palette"></i> Cambiar Contraseña
             </a>
         </li>
     </ul>

     <!-- Heading -->
     <h6 class="navbar-heading text-muted"></h6>

     <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link  active " href="/home">
                <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
        </li>

         @foreach ($menus as $m)
             @if ($menu->where('padre_id', $m->id)->count() == 0)
                 <li class="nav-item">
                     <a class="nav-link " href="{{ url($m->ruta) }}">
                         <i class="{{$m->icono}}"></i> {{ $m->nombre }}
                         
                     </a>
                 </li>
             @else
                 <li class="nav-item">
                     <a class="nav-link" data-toggle="collapse" href="#{{ $m->nombre }}" aria-expanded="false"
                         aria-controls="{{ $m->nombre }}">
                         <i class="{{$m->icono}}"></i>{{ $m->nombre }}
                     </a>
                 </li>

                 <div class="collapse" id="{{ $m->nombre }}">
                   
                     <ul>
                         @foreach ($menu->where('padre_id', $m->id) as $submenu)
                             <li class="nav-item" style="list-style: none">
                                 <a class="nav-link " href="{{ url($submenu->ruta) }}">
                                     <i class="{{ $submenu->icono }}"></i> {{ $submenu->nombre }}
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             @endif
         @endforeach
     </ul>
 </div>
