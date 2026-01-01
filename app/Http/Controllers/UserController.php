<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'menuAdminUser' => 'active',
            'user' => User::orderBy('jabatan', 'asc')->get(),
        );
        return view('admin/user/index', $data);
    }


    public function create()
    {
        $data = array(
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',

        );
        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed', 
            'jabatan' => 'required|in:admin,karyawan',
        
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'jabatan.required' => 'Jabatan wajib dipilih.',
            'jabatan.in' => 'Jabatan tidak valid.',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jabatan = $request->jabatan;
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data berhasil ditambahkan.');
    }
}
