<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'menuDashboard' => 'active',    
            'jumlahUser' => User::count(),
            'jumlahAdmin' => User::where('jabatan', 'Admin')->count(),
            'jumlahKaryawan' => User::where('jabatan', 'Karyawan')->count(),
            'jumlahDitugaskan' => User::where('jabatan', 'Karyawan')->where('is_tugas',True)->count(),
            'jumlahBelumDitugaskan' => User::where('jabatan', 'Karyawan')->where('is_tugas',False)->count(),
        );


        return view('dashboard', $data);
    }
}
