<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::with('subcategories')->get();
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);

        return Category::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $cat->update($request->all());
        return $cat;
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Categoria eliminada']);
    }
}

