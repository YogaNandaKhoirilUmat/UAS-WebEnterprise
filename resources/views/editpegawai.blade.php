<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pegawai</title>
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
                <h1>Edit Data Pegawai</h1>
                <p>Edit Data Pegawai pada PT Konstruksi</p>
            </div>
            <div>
                <button class="card-button">Tambah Pegawai</button>
            </div>
        </header>

        <div>
            <div class="container">

                    <form action="{{ url(Auth ::user()->role.'/pegawai/edit/' .$editpegawai->id_pegawai) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai:</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $editpegawai->nama_pegawai }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $editpegawai->jabatan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $editpegawai->alamat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP:</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $editpegawai->no_hp }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Rekapitulasi</button>
                    </form>
            </div>
        </div>


        <footer>
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>
</body>
</html>
