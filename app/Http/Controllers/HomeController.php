<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
{
    $isAdmin = Auth::user()->level === 'admin';


    // Ambil data berdasarkan tanggal mulai
    $totalProyek = Proyek::selectRaw('DATE(tanggal_mulai) as start_date, COUNT(*) as total')
        ->groupBy('start_date')
        ->orderBy('start_date', 'asc')
        ->get();

    $dates = [];
    $totals = [];

    foreach ($totalProyek as $proyek) {
        $dates[] = Carbon::parse($proyek->start_date)->format('Y-m-d'); // Tanggal mulai
        $totals[] = $proyek->total; // Total proyek
    }

    // Buat grafik
    $chart = LarapexChart::barChart()
        // ->setTitle('Total Proyek By Tanggal Mulai')
        // ->setSubtitle('PT Konstruksi')
        ->addData('Total Proyek', $totals)
        ->setXaxis($dates);

        // Hitung total pegawai
        $totalPegawai = Pegawai::count();

        if ($isAdmin) {
            $totalProyek->where('user_id', auth::id());
        }

    // Kirim data ke view
    return view('home', [
        'chart' => $chart,
        'totalProyek' => Proyek::count(),
        'totalBudget' => 'Rp 10,000,000',
        'totalPengeluaran' => 'Rp 5,000,000',
        'totalPegawai' => $totalPegawai
    ]);


}

}
