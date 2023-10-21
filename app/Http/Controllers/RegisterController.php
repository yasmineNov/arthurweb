<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\flash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.register', [
            "title" => "register",
            // "active" => "register"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'whatsapp' => 'required|min:11:max:12',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
