<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Pegawai</title>
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
        <header style="display: flex; justify-content: space-between">

            <div>
                <h1>Tambah Pegawai</h1>
                <p>Tambah Pegawai Baru</p>
            </div>
            <div>
                <button class="card-button">Tambah Pegawai</button>
            </div>
        </header>

        <div>
            <div class="container">

                    <form action="{{ url(Auth ::user()->role.'/pegawai/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai:</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP:</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
                    </form>
            </div>
        </div>


        <footer>
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>
</body>
</html>
