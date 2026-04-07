<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Mostrar carrito (solo para mostrar lo que venga de sesión o BD si quieres)
    public function index()
    {
        $carrito = session('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    // Añadir producto al carrito (versión servidor, por si la usas)
    public function agregar(Request $request)
    {
        $producto = Product::findOrFail($request->id);

        $carrito = session('carrito', []);

        if (!isset($carrito[$producto->id])) {
            $carrito[$producto->id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'imagen' => $producto->imagen
            ];
        } else {
            $carrito[$producto->id]['cantidad']++;
        }

        session(['carrito' => $carrito]);

        return back()->with('success', 'Producto añadido al carrito');
    }

    public function eliminar(Request $request)
    {
    $carrito = session('carrito', []);
    unset($carrito[$request->id]);
        session(['carrito' => $carrito]);

        return back();
    }

    public function vaciar()
    {
        session()->forget('carrito');
        return back();
    }

    // Checkout: carrito ya viene de sesión (si quieres usarlo) o de BD
    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para finalizar la compra');
        }

        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío');
        }

        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);

        $order = Order::create([
            'user_id' => Auth::id(),
            'estado' => 'pendiente',
            'nombre' => $request->nombre ?? Auth::user()->name,
            'direccion_envio' => $request->direccion_envio ?? 'Pendiente',
            'ciudad' => $request->ciudad ?? 'Pendiente',
            'provincia' => $request->provincia ?? 'Pendiente',
            'cp' => $request->cp ?? '00000',
            'telefono' => $request->telefono ?? '000000000',
            'direccion_facturacion' => $request->direccion_facturacion ?? 'Pendiente',
            'total' => $total,
        ]);

        foreach ($carrito as $item) {
            $order->products()->attach($item['id'], [
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
                'has_to_comment' => true,
            ]);

            $producto = Product::find($item['id']);
            if ($producto) {
                $producto->stock -= $item['cantidad'];
                $producto->save();
            }
        }

        session()->forget('carrito');

        return redirect()->route('checkout.success');
    }

    // Sincronizar localStorage → BD al hacer login
    public function sincronizar(Request $request)
    {
        $carrito = json_decode($request->getContent(), true);

        if (!$carrito || !Auth::check()) {
            return response()->json(['status' => 'empty']);
        }

        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);

        $order = Order::create([
            'user_id' => Auth::id(),
            'estado' => 'pendiente',
            'nombre' => Auth::user()->name,
            'direccion_envio' => 'Pendiente',
            'ciudad' => 'Pendiente',
            'provincia' => 'Pendiente',
            'cp' => '00000',
            'telefono' => '000000000',
            'direccion_facturacion' => 'Pendiente',
            'total' => $total,
        ]);

        foreach ($carrito as $item) {
            $order->products()->attach($item['id'], [
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
                'has_to_comment' => false,
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
