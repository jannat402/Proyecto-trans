<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::with('role')->get();
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Usuario eliminado']);
    }
}
