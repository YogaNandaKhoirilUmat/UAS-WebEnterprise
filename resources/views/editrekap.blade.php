<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Rekapitulasi</title>
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
                <h1>Edit Data Rekapitulasi</h1>
                <p>Edit Data Rekapitulasi Yang Ada Di PT Konstruksi</p>
            </div>
            <div>
                <button class="card-button">Tambah Rekapitulasi</button>
            </div>
        </header>

        <div>
            <div class="container">

                    <form action="{{ url('/rekapitulasi/edit/' .$editrekap->id_rekap) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="text" name="nama_proyek" class="form-control" required value="{{ $editrekap->nama_proyek }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required value="{{ $editrekap->tanggal }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required value="{{ $editrekap->keterangan }}">
                        </div>

                        <div class="form-group">
                            <label for="kredit">Kredit</label>
                            <input type="number" name="kredit" class="form-control" required value="{{ $editrekap->kredit }}">
                        </div>

                        <div class="form-group">
                            <label for="debit">Debit</label>
                            <input type="number" name="debit" class="form-control" required value="{{ $editrekap->debit }}">
                        </div>

                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="number" name="saldo" class="form-control" required value="{{ $editrekap->saldo }}">
                        </div>

                        <div class="form-group">
                            <label for="images">Nota</label>
                            <input type="file" name="image" class="form-control" required>
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
