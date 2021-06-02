<x-plantilla>
    <x-slot name="titulo">Gestión Usuarios</x-slot>
    <x-slot name="cabecera">Editar Usuario</x-slot>
    <x-errores />
    <form name="fp" method="POST" action="{{route('usuarios.update', $usuario)}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    @method("PUT")
    @bind($usuario)
    <x-form-input name="nomusu" label="Nickname" />
    <x-form-input name="mail" label="Correo Electrónico" type="email"/>
    <x-form-input name="localidad" label="Localidad"/>
    <x-form-select name="perfil_id" :options="$misPerfiles" label="Perfil"/>
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    <a class="btn btn-info mx-3" href="{{route('usuarios.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>