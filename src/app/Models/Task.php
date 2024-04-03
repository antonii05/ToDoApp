<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'datos_adjuntos',
        'fecha_limite',
        'archivado',
        'id_categoria',
        'usuario_id',
        'id_grupo',
    ];


   /* 
    * Relacion para las tareas
    */
    public function tareas(){
        return $this->belongsToMany(User::class);
    }
}