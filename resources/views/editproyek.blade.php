<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Proyek</title>
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
                <h1>Edit Data Proyek</h1>
                <p>Edit Data Proyek Yang Ada Di PT Konstruksi</p>
            </div>
            <div>
                <button class="card-button">Tambah Proyek</button>
            </div>
        </header>

        <div>
            <div class="container">

                    <form action="{{ url(Auth ::user()->role.'/projects/edit/' .$editproyek->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_proyek">Nama Proyek:</label>
                            <input type="text" name="nama_proyek" class="form-control" required value="{{ $editproyek->nama_proyek }}">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" required value ="{{ $editproyek->deskripsi }}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required value="{{ $editproyek->tanggal_mulai }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai:</label>
                            <input type="date" name="tanggal_selesai" class="form-control" required value="{{ $editproyek->tanggal_selesai }}">
                        </div>

                        <div class="form-group">
                            <label for="status_proyek">Status Proyek:</label>
                            <select name="status_proyek" class="form-control" required value="{{ $editproyek->status_proyek }}">
                                <option value="">Pilih Status</option>
                                <option value="On Progress">On Progress</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Tertunda">Tertunda</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi Proyek:</label>
                            <textarea name="lokasi" class="form-control" rows="3" required value ="{{ $editproyek->lokasi }}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar Proyek:</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Proyek</button>
                    </form>
            </div>
        </div>


        <footer>
            <p>&copy; 2024 Yoga Nanda Khoiril Umat. UAS Pemrograman Web Enterprise.</p>
        </footer>
    </div>
</body>
</html>
