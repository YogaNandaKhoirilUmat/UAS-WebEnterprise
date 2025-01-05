<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard Konstruksi</h2>
        <ul>
            <li><a href="{{ url('home')}}">Home</a></li>
            <li><a href="{{ url('projects')}}">Projects</a></li>
            <li><a href="{{ url('projects/laporan')}}">Laporan Proyek</a></li>
            <li><a href="{{ url('rekapitulasi')}}">Rekapitulasi</a></li>
            <li><a href="{{ url('pegawai')}}">Pegawai</a></li>
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
                <h1>Daftar Data Pegawai</h1>
                <p>Daftar Data Pegawai PT Konstruksi </p>
            </div>

            @if ($isAdmin)
                <div>
                    <a href="{{ url('/pegawai/add') }}" class="btn btn-primary">Tambah Pegawai</a>
                </div>
            @endif

        </header>

        <div class="container">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>
                            <a href="{{ url()->current() }}?sort=nama_pegawai&direction={{ $sort === 'nama_pegawai' && $direction === 'asc' ? 'desc' : 'asc' }}">
                                Nama Pegawai
                                @if ($sort === 'nama_pegawai')
                                    <span>{{ $direction === 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama_pegawai }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>
                            @if ($isAdmin)
                                <div class="d-flex justify-content-between">
                                    <!-- Tombol Edit -->
                                    <a href="{{ url('/pegawai/edit/' . $user->id_pegawai) }}" class="btn btn-warning btn-sm mr-2">Edit</a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ url('/pegawai/delete/' . $user->id_pegawai) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ url('/pegawai/print') }}?sort={{ $sort }}&direction={{ $direction }}"
            class="btn btn-secondary w-100 d-flex justify-content-center align-items-center
            text-white cursor-pointer">Export to PDF</a>
        </div>

        <footer class="mt-4 text-center">
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>

</body>
</html>
