<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard Konstruksi</h2>
        <ul>
            <li><a href="{{ url(Auth ::user()->role.'/home')}}">Home</a></li>
            <li><a href="{{ url(Auth ::user()->role.'/projects')}}">Projects</a></li>
            <li><a href="{{ url(Auth ::user()->role.'/projects/laporan')}}">Laporan Proyek</a></li>
            <li><a href="{{ url(Auth ::user()->role.'/rekapitulasi')}}">Rekapitulasi</a></li>
            <li><a href="{{ url(Auth ::user()->role.'/pegawai')}}">Pegawai</a></li>
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

        <div class="container mt-4">
            <h2 class="text-center mb-4">Laporan Proyek</h2>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>
                            <a href="{{ url()->current() }}?sort=nama_proyek&direction={{ $sort === 'nama_proyek' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Nama Proyek
                                @if ($sort === 'nama_proyek')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>Deskripsi</th>
                        <th>
                            <a href="{{ url()->current() }}?sort=tanggal_mulai&direction={{ $sort === 'tanggal_mulai' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Tanggal Mulai
                                @if ($sort === 'tanggal_mulai')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ url()->current() }}?sort=tanggal_selesai&direction={{ $sort === 'tanggal_selesai' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Tanggal Selesai
                                @if ($sort === 'tanggal_selesai')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>Status Proyek</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyek as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->nama_proyek }}</td>
                            <td>{{ $project->deskripsi }}</td>
                            <td>{{ $project->tanggal_mulai }}</td>
                            <td>{{ $project->tanggal_selesai }}</td>
                            <td>{{ $project->status_proyek }}</td>
                            <td>{{ $project->lokasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="{{ url('/projects/laporan/print') }}?sort={{ $sort }}&direction={{ $direction }}"
            class="btn btn-secondary w-100 d-flex justify-content-center align-items-center
            text-white cursor-pointer">Export to PDF</a>
        </div>

    </div>

</div>

</body>
</html>
