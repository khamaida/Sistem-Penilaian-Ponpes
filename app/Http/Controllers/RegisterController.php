<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class RegisterController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('register')->with('kategoris', $kategoris);
    }


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required', 'string', 'max:255',
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => 'required', 'string',
            'kamar' => 'required', 'string', 'max:100',
            'kategori_id' => 'required'
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);



        return redirect('/')->with('success', 'Registration successfull!! Please Login!');
    }
}
