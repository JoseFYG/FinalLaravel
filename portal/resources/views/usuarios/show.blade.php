<x-plantilla>
    <x-slot name="titulo">Usuario {{$usuario->nomusu}}</x-slot>
    <x-slot name="cabecera">Detalles Usuario {{$usuario->id}}</x-slot>
    <div class="row justify-content-center">
    <div class="card mt-3" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title text-center">{{$usuario->nomusu}} - <a href="{{route('perfiles.show', $usuario->perfil->id)}}">{{$usuario->perfil->nombre}}</a></h4>
          <h6 class="card-subtitle mb-2 text-muted text-center mt-1">{{$usuario->mail." - ".$usuario->localidad}}</h6>
          <div class="row justify-content-rigth">
              <a class="btn btn-info mt-2" onclick="window.history.back()"><i class="fas fa-backward"></i> Volver</a>
          </div>
        </div>
    </div>
    </div>
</x-plantilla>