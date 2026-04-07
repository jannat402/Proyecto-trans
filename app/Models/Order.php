<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'estado',
        'nombre',
        'direccion_envio',
        'ciudad',
        'provincia',
        'cp',
        'telefono',
        'direccion_facturacion',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('cantidad', 'precio_unitario', 'has_to_comment')
                    ->withTimestamps();
    }
}
