<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Http\Requests\StoreRekapRequest;
use App\Http\Requests\UpdateRekapRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ViewRekap(Request $request)
{
    // Ambil parameter sort dan direction dari request
    $sort = $request->get('sort', 'tanggal'); // Default: 'tanggal'
    $direction = $request->get('direction', 'asc'); // Default: ascending

    // Ambil data Rekap berdasarkan sorting
    $rekap = Rekap::orderBy($sort, $direction)->get();

    return view('rekap', [
        'rekap' => $rekap,
        'sort' => $sort,
        'direction' => $direction
    ]);
}


public function AddRekap(Request $request)
{
    $userId = Auth::id(); // Use Auth::id() to get the logged-in user ID

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);
    }

    Rekap::create([
        'nama_proyek' => $request->nama_proyek,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
        'kredit' => $request->kredit,
        'debit' => $request->debit,
        'saldo' => $request->saldo,
        'image' => $imageName,
        'user_id' => $userId // Pass the authenticated user ID
    ]);

    return redirect('/rekapitulasi')->with('success', 'Rekap berhasil ditambahkan!');
}
    public function ViewAddRekap()
    {
        return view('addrekap');
    }

    public function DeleteRekap($id_rekap)
    {
        Rekap::where('id_rekap', $id_rekap)->delete();
        return redirect('/rekapitulasi')->with('success', 'Rekap berhasil dihapus!');
    }

    public function ViewEditRekap($id_rekap)
    {
        $editrekap = Rekap::where('id_rekap', $id_rekap)->first();
        return view('editrekap', ['editrekap' => $editrekap]);
    }

    public function UpdateRekap(Request $request, $id_rekap)
    {
        $imageName=null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }

        $rekap = Rekap::where('id_rekap', $id_rekap)->first();
        $rekap->update([
            'nama_proyek' => $request->nama_proyek,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'kredit' => $request->kredit,
            'debit' => $request->debit,
            'saldo' => $request->saldo,
            'image' => $imageName,
        ]);
        return redirect('/rekapitulasi')->with('success', 'Rekap berhasil diupdate!');
    }

    public function printrekap(Request $request)
{
    // Ambil parameter sort dan direction
    $sort = $request->get('sort', 'tanggal'); // Default: 'tanggal'
    $direction = $request->get('direction', 'asc'); // Default: ascending

    // Ambil data Rekap berdasarkan sorting
    $rekap = Rekap::orderBy($sort, $direction)->get();

    // Generate PDF menggunakan data yang sudah diurutkan
    $pdf = Pdf::loadView('reportrekap', ['rekap' => $rekap]);

    return $pdf->stream('laporan-rekap.pdf');
}

}
