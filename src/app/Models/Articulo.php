<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'matricula',
        'medida',
        'id_familia',
        'id_proveedor',
        'tipo_compra',
        'barcode',
        'precio_venta',
        'compras_unidad_medida',
        'ventas_unidad_medida',
        'articulo_obsoleto',
        'created_at',
        'updated_at',
    ];
}
