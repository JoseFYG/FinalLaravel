<x-plantilla>
    <x-slot name="titulo">Gestión Usuarios</x-slot>
    <x-slot name="cabecera">Crear Usuario</x-slot>
    <x-errores />
    <form name="fu" method="POST" action="{{route('usuarios.store')}}" class="p-4 text-light bg-primary mt-3">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nickname</span>
        <input type="text" name="nomusu" class="form-control" placeholder="Nickname" aria-label="Nickname" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Correo Electrónico</span>
        <input type="email" name="mail" class="form-control" placeholder="Correo Electrónico" aria-label="Mail" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Localidad</span>
        <input type="text" name="localidad" class="form-control" placeholder="Localidad" aria-label="Localidad" aria-describedby="basic-addon1">
    </div>
    <x-form-select name="perfil_id" :options="$misPerfiles" label="Perfil"/>
    <div class="mt-3">
    <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Crear</button>
    <button type="reset" class="btn btn-warning mr-5"><i class="fas fa-broom"></i> Limpiar</button>
    <a class="btn btn-info mx-3" href="{{route('usuarios.index')}}"><i class="fas fa-backward"></i> Volver</a>
    </div>
    </form>
</x-plantilla>