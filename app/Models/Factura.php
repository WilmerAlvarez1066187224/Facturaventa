<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Factura extends Model
{

    use HasFactory;


    protected $fillable=['cantidad', 'descripcion', 'telefono','valor_unitario','valor_total','abono','cedula','cliente_id'];


    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
