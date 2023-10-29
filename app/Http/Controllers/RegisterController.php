<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index' , [
            'title' => 'Register',
            'jurusan' => Jurusan::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'max:255'],
            'nis' => ['required', 'min:3', 'max:20', 'unique:users'],
            'kelas_id' => ['required'],
            'jurusan_id' => ['required'],
            'password' => 'required|min:5|max:100'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
