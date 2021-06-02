<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles=Perfil::orderBy('nombre')->paginate(3);
        return view('perfiles.index', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
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
            'nombre'=>['required', 'string', 'min:3', 'max:30', 'unique:perfils,nombre'],
            'descripcion'=>['required', 'string', 'min:10', 'max:100']
        ]);
        try{
            Perfil::create($request->all());
        }catch(\Exception $ex){
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('perfiles.index')->with('mensaje', 'Perfil Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfile)
    {
        return view('perfiles.show', compact('perfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfile)
    {
        return view('perfiles.edit', compact('perfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfile)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'max:30', 'unique:perfils,nombre,'.$perfile->id],
            'descripcion'=>['required', 'string', 'min:10', 'max:100']
        ]);
        try{
            $perfile->update($request->all());
        }catch(\Exception $ex){
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('perfiles.index')->with('mensaje', 'Perfil Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfile)
    {
        try{
            $perfile->delete();
        }catch(\Exception $ex){
            return redirect()->route('perfiles.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('perfiles.index')->with('mensaje', 'Perfil Borrado');
    }
}
