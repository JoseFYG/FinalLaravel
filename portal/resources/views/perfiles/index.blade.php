<x-plantilla>
    <x-slot name="titulo">Perfiles</x-slot>
    <x-slot name="cabecera">Gestión de Perfiles</x-slot>
    <x-mensajes />
    <a href="{{route('perfiles.create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i> Crear Perfil</a>
    <table class="table table-primary table-striped mt-2">
        <thead>
          <tr>
            <th scope="col">Detalles</th>
            <th scope="col">Nombre</th>
            <th scope="col" class="text-center">Descripción</th>
            <th scope="col" colspan=2 class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($perfiles as $item)
          <tr>
            <th scope="row">
                <a href="{{route('perfiles.show', $item)}}" class="btn btn-info"><i class="fas fa-info-circle"></i> Detalles</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td class="text-justify">{{$item->descripcion}}</td>
            <td class="text-center">
                <a href="{{route('perfiles.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
              <form name="borrado" method="POST" action="{{route('perfiles.destroy', $item)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$perfiles->links()}}
      </div>
</x-plantilla>