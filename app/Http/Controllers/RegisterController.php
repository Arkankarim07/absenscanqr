<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index' , [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'max:255'],
            'nis' => ['required', 'min:3', 'max:20', 'unique:users'],
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'password' => 'required|min:5|max:100'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
