<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function ViewPegawai(Request $request)
{
    // Ambil parameter sort dan direction dari request
    $sort = $request->get('sort', 'nama_pegawai'); // Default: Nama Pegawai
    $direction = $request->get('direction', 'asc'); // Default: Ascending

    // Query data pegawai dengan sorting
    $pegawai = Pegawai::orderBy($sort, $direction)->get();


    // Tentukan apakah user adalah admin
    $isAdmin = Auth::user()->role === 'admin';


    return view('pegawai', [
        'pegawai' => $pegawai,
        'sort' => $sort,
        'direction' => $direction,
        'isAdmin' => $isAdmin // Kirim informasi role admin
    ]);
}



    public function AddPegawai()
    {
        Pegawai::create([
            'nama_pegawai' => request('nama_pegawai'),
            'jabatan' => request('jabatan'),
            'alamat' => request('alamat'),
            'no_hp' => request('no_hp'),
            'user_id' => Auth::user()->id
        ])  ;

        return redirect(Auth::user()->role.'/pegawai')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function ViewAddPegawai()
    {
        return view('addpegawai');
    }

    public function DeletePegawai($id_pegawai)
    {
        Pegawai::where('id_pegawai', $id_pegawai)->delete();
        return redirect(Auth::user()->role.'/pegawai')->with('success', 'Pegawai berhasil dihapus!');
    }

    public function ViewEditPegawai($id_pegawai)
    {
        $editpegawai = Pegawai::where('id_pegawai', $id_pegawai)->first();
        return view('editpegawai', compact('editpegawai'));
    }

    public function UpdatePegawai($id_pegawai)
    {
        Pegawai::where('id_pegawai', $id_pegawai)->update([
            'nama_pegawai' => request('nama_pegawai'),
            'jabatan' => request('jabatan'),
            'alamat' => request('alamat'),
            'no_hp' => request('no_hp'),
        ]);
        return redirect(Auth::user()->role.'/pegawai')->with('success', 'Pegawai berhasil diupdate!');
    }

    public function printpegawai(Request $request)
{
    // Ambil parameter sort dan direction
    $sort = $request->get('sort', 'nama_pegawai'); // Default: Nama Pegawai
    $direction = $request->get('direction', 'asc'); // Default: Ascending

    // Query dengan sorting
    $pegawai = Pegawai::orderBy($sort, $direction)->get();

    // Generate PDF menggunakan data yang sudah diurutkan
    $pdf = Pdf::loadView('reportpegawai', ['pegawai' => $pegawai]);

    return $pdf->stream('laporan-pegawai.pdf');
}

}
