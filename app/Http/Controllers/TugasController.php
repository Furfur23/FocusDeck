<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tugas;
use App\Exports\TugasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Tugas',
            'menuAdminTugas' => 'active',
            'tugas' => Tugas::with('user')->get(),
        );
        return view('admin/tugas/index', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Tambah Tugas Baru',
            'menuAdminTugas' => 'active',
            'users' => User::select('id', 'nama')
                       ->orderBy('nama', 'asc')
                       ->get(),
        );
        return view('admin/tugas/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tugas' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tugas = new Tugas();
        $tugas->user_id = $request->user_id;
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();

        $user = User::find($request->user_id);
        $user->is_tugas = true;
        $user->save();

        return redirect()->route('tugas')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Data Tugas',
            'menuAdminTugas' => 'active',
            "tugas" => Tugas::with('user')->findOrFail($id),
            
        );
        return view('admin/tugas/update', $data);
    }
   
     public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();
       
        return redirect()->route('tugas')->with('success', 'Tugas berhasil di Update!');
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $user = User::find($tugas->user_id);
        $tugas->delete();

        $hasOtherTasks = Tugas::where('user_id', $user->id)->exists();
        if (!$hasOtherTasks) {
            $user->is_tugas = false;
            $user->save();
        }

        return redirect()->route('tugas')->with('success', 'Tugas berhasil dihapus!');
    }

     public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new TugasExport, 'DataTugas_' . $filename . '.xlsx');
    }
}
