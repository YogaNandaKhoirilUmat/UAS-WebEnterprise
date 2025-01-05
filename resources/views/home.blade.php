<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>
<body>

    <div class="sidebar">
        <h2>Dashboard Konstruksi</h2>
        <ul class="sidebar-menu">
            <li><a href="{{ url(Auth::user()->role.'/home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ url(Auth::user()->role.'/projects') }}"><i class="fas fa-project-diagram"></i> Projects</a></li>
            <li><a href="{{ url(Auth::user()->role.'/projects/laporan') }}"><i class="fas fa-file-alt"></i> Laporan Proyek</a></li>
            <li><a href="{{ url(Auth::user()->role.'/rekapitulasi') }}"><i class="fas fa-chart-bar"></i> Rekapitulasi</a></li>
            <li><a href="{{ url(Auth::user()->role.'/pegawai') }}"><i class="fas fa-users"></i> Pegawai</a></li>
            <li>
                <form action="{{ url('/logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>


    <div class="main-content">
        <header>
            <h1>Selamat Datang di Dashboard Konstruksi PT Konstruksi</h1>
        </header>

        <div class="cards">
            <div class="card">
                <h3>Projects</h3>
                <p id="total-projects">{{ $totalProyek }}</p>
            </div>
            <div class="card">
                <h3>Budget</h3>
                <p id="total-budget">{{ $totalBudget }}</p>
            </div>
            <div class="card">
                <h3>Pengeluaran</h3>
                <p id="total-pengeluaran">{{ $totalPengeluaran }}</p>
            </div>
            <div class="card">
                <h3>Pegawai</h3>
                <p id="total-pegawai">{{ $totalPegawai }}</p>
            </div>
        </div>

    <div class="alert alert-primary" role="alert">
        Selamat Datang di Dashboard Konstruksi
    </div>

    <div id="chart">
        <h2>Grafik Rekapitulasi Berdasarkan Tanggal Mulai</h2>
        <canvas id="ProyekChart"></canvas>
        {!! $chart->container() !!}
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="script.js"></script>
    <script src="{{ $chart->cdn() }}"></script>
    {!! $chart->script() !!}

</body>
</html>
