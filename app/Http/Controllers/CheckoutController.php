<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['error' => 'Carret buit'], 400);
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => 0,
            'estado' => 'pendent',
            'nombre' => $request->nombre,
            'direccion_envio' => $request->direccion_envio,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'cp' => $request->cp,
            'telefono' => $request->telefono,
            'direccion_facturacion' => $request->direccion_facturacion,
        ]);

        $total = 0;

        foreach ($cart as $product_id) {
            $product = Product::find($product_id);
            $total += $product->precio;

            $order->products()->attach($product_id, [
                'cantidad' => 1,
                'precio_unitario' => $product->precio
            ]);

            $product->stock -= 1;
            $product->save();
        }

        $order->total = $total;
        $order->save();

        session()->forget('cart');

        return response()->json(['message' => 'Compra completada', 'order' => $order]);
    }
}
