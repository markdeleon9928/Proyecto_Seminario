<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Inventario extends Model
{
    protected $fillable = ['nombre_producto', 'sku', 'existencias'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'sku', 'sku');
    }
}
