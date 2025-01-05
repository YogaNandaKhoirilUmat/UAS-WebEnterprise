<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Http\Requests\StoreProyekRequest;
use App\Http\Requests\UpdateProyekRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewProjects()
{
    // Ambil semua proyek tanpa memfilter user_id
    $proyek = Proyek::all();

    // Tentukan apakah user adalah admin
    $isAdmin = Auth::user()->role === 'admin';

    return view('project', [
        'proyek' => $proyek, // Semua proyek
        'isAdmin' => $isAdmin // True jika admin
    ]);
}



public function addProject(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama_proyek' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'status_proyek' => 'required|string',
        'lokasi' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    // Tambahkan user_id dari pengguna yang login
    $validated['user_id'] = Auth::id();

    // Proses upload gambar jika ada
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $validated['image'] = $imageName;
    }

    // Simpan data ke database
    Proyek::create($validated);

    return redirect(Auth::user()->role . '/projects')->with('success', 'Proyek berhasil ditambahkan!');
}

    public function ViewAddProject()
    {
        return view('addproyek');
    }

    public function deleteProject($id)
{
    // Cek apakah proyek ada
    $proyek = Proyek::findOrFail($id);

    // Hapus proyek
    $proyek->delete();

    // Redirect dengan pesan sukses
    return redirect(Auth::user()->role.'/projects')->with('success', 'Proyek berhasil dihapus!');
}
public function ViewEditProject($id)
{
    // Menemukan proyek berdasarkan id_proyek
    $editproyek = Proyek::findOrFail($id);

    // Meneruskan data proyek ke view
    return view('editproyek', compact('editproyek'));
}

public function updateProject(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nama_proyek' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'status_proyek' => 'required|string',
        'lokasi' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    // Temukan proyek berdasarkan ID
    $proyek = Proyek::findOrFail($id);

    // Proses upload gambar baru (jika ada)
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($proyek->image) {
            Storage::delete('public/images/' . $proyek->image);
        }

        // Upload gambar baru
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        // Tambahkan nama file gambar baru ke array validated
        $validated['image'] = $imageName;
    }

    // Update proyek
    $proyek->update($validated);

    // Redirect dengan pesan sukses
    return redirect(Auth::user()->role.'/projects')->with('success', 'Proyek berhasil diubah!');
}

public function ViewLaporanProject(Request $request)
{
    // Ambil parameter sort dan direction dari request, dengan default sort 'tanggal_mulai' dan direction 'asc'
    $sort = $request->get('sort', 'tanggal_mulai'); // Default: Tanggal Mulai
    $direction = $request->get('direction', 'asc'); // Default: Ascending

    // Ambil data proyek berdasarkan sorting
    $proyek = Proyek::orderBy($sort, $direction)->get();

    return view('laporanproyek', [
        'proyek' => $proyek,
        'sort' => $sort,
        'direction' => $direction
    ]);
}


public function printproyek(Request $request)
{
    // Ambil parameter sort dan direction, defaultnya sama seperti sebelumnya
    $sort = $request->get('sort', 'tanggal_mulai'); // Default: tanggal_mulai
    $direction = $request->get('direction', 'asc'); // Default: asc

    // Ambil data proyek dengan sorting sesuai parameter
    $proyek = Proyek::orderBy($sort, $direction)->get();

    // Generate PDF menggunakan data yang sudah diurutkan
    $pdf = Pdf::loadView('reportproyek', ['proyek' => $proyek]);

    return $pdf->stream('laporan-proyek.pdf');
}



}



