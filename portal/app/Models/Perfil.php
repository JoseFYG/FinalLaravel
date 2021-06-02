<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'descripcion'];

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

    public static function getArrayIdNombre(){
        $perfiles=Perfil::orderBy('nombre')->get();
        $miArray=[];
        foreach($perfiles as $item){
            $miArray[$item->id]=$item->nombre;
        }
        return $miArray;
    }
}
