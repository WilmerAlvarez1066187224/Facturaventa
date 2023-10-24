<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable=['nombre','apellido','telefono','correo','direccion','cedula' ];

    public function facturas(): HasMany
    {
        return $this->hasMany(Factura::class);
    }
}
