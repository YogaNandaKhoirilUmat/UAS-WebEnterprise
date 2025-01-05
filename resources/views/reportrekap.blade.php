<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekapitulasi</title>
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

    <h2>Laporan Rekapitulasi</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Proyek</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kredit</th>
                <th>Debit</th>
                <th>Saldo</th>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
