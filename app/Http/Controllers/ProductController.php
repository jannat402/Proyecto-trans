<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('subcategory.category')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'subcategory_id' => 'required|exists:subcategories,id'
        ]);

        return Product::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $prod = Product::findOrFail($id);
        $prod->update($request->all());
        return $prod;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Producto eliminado']);
    }
}
