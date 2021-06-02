<?php

namespace App\Http\Controllers;

use App\Models\{Usuario, Perfil};
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::orderBy('nomusu')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misPerfiles=Perfil::getArrayIdNombre();
        return view('usuarios.create', compact('misPerfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomusu'=>['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu'],
            'localidad'=>['required', 'string', 'min:3', 'max:90'],
            'mail'=>['required', 'string', 'min:5', 'max:90', 'unique:usuarios,mail'],
            'perfil_id'=>['required'] 
        ]);
        try{
            Usuario::create($request->all());
        }catch(\Exception $ex){
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $misPerfiles=Perfil::getArrayIdNombre();
        return view('usuarios.edit', compact('usuario', 'misPerfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nomusu'=>['required', 'string', 'min:3', 'max:30', 'unique:usuarios,nomusu,'.$usuario->id],
            'localidad'=>['required', 'string', 'min:3', 'max:90'],
            'mail'=>['required', 'string', 'min:5', 'max:90', 'unique:usuarios,mail,'.$usuario->id],
            'perfil_id'=>['required'] 
        ]);
        try{
            $usuario->update($request->all());
        }catch(\Exception $ex){
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try{
            $usuario->delete();
        }catch(\Exception $ex){
            return redirect()->route('usuarios.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario Borrado');
    }
}
