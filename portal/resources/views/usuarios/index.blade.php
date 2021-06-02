<x-plantilla>
    <x-slot name="titulo">Usuarios</x-slot>
    <x-slot name="cabecera">Gestión de Usuarios</x-slot>
    <x-mensajes />
    <a href="{{route('usuarios.create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i> Crear Usuario</a>
    <table class="table table-primary table-striped mt-2">
        <thead>
          <tr>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Nickname</th>
            <th scope="col" class="text-center">Correo Electrónico</th>
            <th scope="col" class="text-center">Localidad</th>
            <th scope="col" colspan=2 class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $item)
          <tr>
            <th scope="row" class="text-center">
                <a href="{{route('usuarios.show', $item)}}" class="btn btn-info"><i class="fas fa-info-circle"></i> Detalles</a>
            </th>
            <td class="text-center">{{$item->nomusu}}</td>
            <td class="text-center">{{$item->mail}}</td>
            <td class="text-center">{{$item->localidad}}</td>
            <td class="text-center">
                <a href="{{route('usuarios.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
              <form name="borrado" method="POST" action="{{route('usuarios.destroy', $item)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-user-minus"></i> Borrar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$usuarios->links()}}
      </div>
</x-plantilla>