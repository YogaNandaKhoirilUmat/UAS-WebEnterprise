<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Sidebar -->
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

    <!-- Main Content -->
    <div class="main-content">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h1>Daftar Data Proyek</h1>
                <p>Daftar Data Proyek PT Konstruksi</p>
            </div>
            @if ($isAdmin)
                <div>
                    <a href="{{ url('/projects/add') }}" class="btn btn-primary">Tambah Proyek</a>
                </div>
            @endif
        </header>

        <div class="product-grid">
            @forelse ($proyek as $project)
                <div class="product-card">
                    <!-- Gambar Proyek -->
                    <img src="{{ asset('storage/public/images/' . $project->image) }}" alt="proyek">

                    <!-- Konten Card -->
                    <h4>{{ $project->nama_proyek }}</h4>
                    <p class="description"><strong>Deskripsi:</strong> {{ $project->deskripsi }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $project->tanggal_mulai }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ $project->tanggal_selesai }}</p>
                    <p class="status {{ strtolower(str_replace(' ', '-', $project->status_proyek)) }}">
                        <strong>Status:</strong> {{ ucfirst($project->status_proyek) }}
                    </p>
                    <p><strong>Lokasi:</strong> {{ $project->lokasi }}</p>

                    <!-- Tombol Edit dan Delete -->
                    @if ($isAdmin)
                     <div class="buttons">
                    <a href="{{ url('/projects/edit/' . $project->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ url('/projects/delete', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">Delete</button>
                    </form>
                    </div>
                    @endif
                </div>
                @empty
                <p class="text-center">Tidak ada proyek yang tersedia saat ini.</p>
            @endforelse
        </div>

        <footer>
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>

</body>
</html>
