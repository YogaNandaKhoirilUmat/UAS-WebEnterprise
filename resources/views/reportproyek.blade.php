<!DOCTYPE html>
<html>
<head>
    <title>Laporan Proyek</title>
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



    <h2>Laporan Proyek</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Proyek</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
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
</body>
</html>

