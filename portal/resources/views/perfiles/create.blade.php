<x-plantilla>
    <x-slot name="titulo">Gestión Perfiles</x-slot>
    <x-slot name="cabecera">Crear Perfil</x-slot>
    <x-errores />
    <form name="fp" method="POST" action="{{route('perfiles.store')}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <span class="input-group-text">Descripción</span>
        <textarea class="form-control" name="descripcion" placeholder="Descripción" aria-label="Descripcion"></textarea>
    </div>
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Crear</button>
    <button type="reset" class="btn btn-warning mr-5"><i class="fas fa-broom"></i> Limpiar</button>
    <a class="btn btn-info mx-3" href="{{route('perfiles.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>