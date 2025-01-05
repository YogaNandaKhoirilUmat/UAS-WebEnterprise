<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Rekapitulasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h1>Rekapitulasi Proyek</h1>
                <p>Daftar Rekapitulasi Penggunaan Anggaran Proyek</p>
            </div>

            <div>
                <a href="{{ url('rekapitulasi/add') }}" class="btn btn-primary">Tambah Bukti</a>
            </div>
        </header>

        <div class="container">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
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
                        <th>
                            <a href="{{ url()->current() }}?sort=tanggal&direction={{ $sort === 'tanggal' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Tanggal
                                @if ($sort === 'tanggal')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>Keterangan</th>
                        <th>
                            <a href="{{ url()->current() }}?sort=kredit&direction={{ $sort === 'kredit' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Kredit
                                @if ($sort === 'kredit')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ url()->current() }}?sort=debit&direction={{ $sort === 'debit' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Debit
                                @if ($sort === 'debit')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>Saldo</th>
                        <th>Nota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekap as $rekapItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rekapItem->nama_proyek }}</td>
                        <td>{{ $rekapItem->tanggal }}</td>
                        <td>{{ $rekapItem->keterangan }}</td>
                        <td>{{ $rekapItem->kredit }}</td>
                        <td>{{ $rekapItem->debit }}</td>
                        <td>{{ $rekapItem->saldo }}</td>
                        <td><img src="{{ asset('storage/public/images/' . $rekapItem->image) }}" alt="proyek" class="img-fluid" style="max-width: 150px; border-radius: 8px;"></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/rekapitulasi/edit/' . $rekapItem->id_rekap) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <form action="{{ url('/rekapitulasi/delete', $rekapItem->id_rekap) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ url('/rekapitulasi/print') }}?sort={{ $sort }}&direction={{ $direction }}"
            class="btn btn-secondary w-100 d-flex justify-content-center align-items-center
            text-white cursor-pointer">Export to PDF</a>
        </div>

        <footer class="mt-4 text-center">
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>

</body>
</html>
