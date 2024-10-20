<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'numero_celular',
        'lugar_trabajo',
        'fecha_registro',
        'estado',
        'fuente_adquisicion',
        'notas',
        'fecha_ultimo_contacto',
        'tipo_cliente',
        'direccion_envio',
        'preferencias_comunicacion',
    ];

    // Validaciones personalizadas
    public static $estadosPermitidos = ['activo', 'inactivo', 'prospecto'];
    public static $tiposClientePermitidos = ['minorista', 'mayorista'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($cliente) {
            // Validar estado
            if (!in_array($cliente->estado, self::$estadosPermitidos)) {
                throw new \InvalidArgumentException('Estado no permitido');
            }

            // Validar tipo de cliente
            if ($cliente->tipo_cliente && !in_array($cliente->tipo_cliente, self::$tiposClientePermitidos)) {
                throw new \InvalidArgumentException('Tipo de cliente no permitido');
            }
        });
    }
}
