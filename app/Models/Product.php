<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'subcategory_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('cantidad', 'precio_unitario', 'has_to_comment')
                    ->withTimestamps();
    }

    public function getTotalVendidoAttribute()
    {
        return $this->orders->sum('pivot.cantidad');
    }

}
