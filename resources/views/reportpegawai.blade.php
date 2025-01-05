<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center; /* Untuk menyelaraskan teks ke tengah secara horizontal */
        }
        .date {
            text-align: right; /* Menyelaraskan tanggal ke kanan */
            margin-bottom: 20px; /* Jarak di bawah tanggal */
        }

    </style>
</head>
<body>
    <div class="date">
        Tanggal: {{ now()->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y H:i') }}
    </div>

    <h2>Laporan Data Pegawai</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>No HP</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
