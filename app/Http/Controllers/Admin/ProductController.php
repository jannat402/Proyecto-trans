<?php 
// app/Http/Controllers/Admin/ProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // LISTADO DE PRODUCTOS
    public function index(Request $request)
    {
        $orden = $request->input('orden', 'desc');

        $productos = Product::with('orders')
            ->orderBy('stock', $orden)
            ->get();

        return view('admin.productos.index', compact('productos', 'orden'));
    }

    // APLICAR DESCUENTO GLOBAL
    public function aplicarDescuento(Request $request)
    {
        $porcentaje = $request->porcentaje;

        Product::all()->each(function ($p) use ($porcentaje) {
            $p->precio = $p->precio - ($p->precio * ($porcentaje / 100));
            $p->save();
        });

        return back()->with('success', 'Descompte aplicat correctament!');
    }

    // API per al gràfic
    public function ventasData()
    {
        $productos = Product::with('orders')->get();

        return response()->json([
            'labels' => $productos->pluck('nombre'),
            'data' => $productos->map(fn($p) => $p->total_vendido)
        ]);
    }
}

?>