<x-plantilla>
    <x-slot name="titulo">Gestión Perfiles</x-slot>
    <x-slot name="cabecera">Editar Perfil</x-slot>
    <x-errores />
    <form name="fp" method="POST" action="{{route('perfiles.update', $perfile)}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    @method("PUT")
    @bind($perfile)
    <x-form-input name="nombre" label="Nombre" />
    <x-form-textarea name="descripcion" label="Descripción" />
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    <a class="btn btn-info mx-3" href="{{route('perfiles.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>