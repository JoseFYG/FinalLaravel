<x-plantilla>
    <x-slot name="titulo">Perfil {{$perfile->nombre}}</x-slot>
    <x-slot name="cabecera">Detalles Perfil {{$perfile->id}}</x-slot>
    <div class="row justify-content-center">
    <div class="card mt-3" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title text-center">{{$perfile->nombre}}</h4>
          <p class="card-text text-center">{{$perfile->descripcion}}</p>
          <p class="card-text text-justify">
            <b>Usuarios</b>
            <ul>
                @foreach($perfile->usuarios as $item)
                <li><a href="{{route('usuarios.show', $item)}}">{{$item->nomusu}}</a></li>
                @endforeach
            </ul>
        </p>
          <div class="row justify-content-rigth">
              <a class="btn btn-info mt-2" onclick="window.history.back()"><i class="fas fa-backward"></i> Volver</a>
          </div>
        </div>
    </div>
    </div>
</x-plantilla>