<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        h1 {
            font-weight: 700;
            text-align: center;
            color: #2b2d42;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, #ee7575, #e10000);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 15px 20px;
            border: none;
            letter-spacing: 0.5px;
        }

        .card-body {
            background-color: white;
            padding: 25px;
        }

        p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        p strong {
            color: #000;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: #0d6efd;
            color: white;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #f1f3f8;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #adb5bd, #6c757d);
            border: none;
            border-radius: 10px;
            font-weight: 500;
            padding: 10px 25px;
            transition: background 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #ff3e24, #e11a00);
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.6rem;
            }

            .card-body {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1>Hasil Perhitungan Kredit</h1>

        <div class="row">
            <!-- Informasi Kontrak -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        Informasi Kontrak
                    </div>
                    <div class="card-body">
                        <p><strong>Nomor Kontrak:</strong> {{ $kontrak->kontrak_no }}</p>
                        <p><strong>Nama Client:</strong> {{ $kontrak->client_name }}</p>
                        <p><strong>Harga OTR:</strong> Rp. {{ number_format($kontrak->otr, 2, ',', '.') }}</p>
                        <p><strong>Down Payment:</strong> Rp. {{ number_format($kontrak->dp, 2, ',', '.') }}</p>
                        <p><strong>Pokok Pinjaman:</strong> Rp. {{ number_format($pokok_pinjaman, 2, ',', '.') }}</p>
                        <p><strong>Suku Bunga:</strong> {{ $kontrak->bunga }}% per tahun</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Angsuran -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        Informasi Angsuran
                    </div>
                    <div class="card-body">
                        <p><strong>Tenor:</strong> {{ $kontrak->tenor }} bulan</p>
                        <p><strong>Angsuran per Bulan:</strong> Rp.
                            {{ number_format($angsuran_per_bulan, 2, ',', '.') }}</p>
                        <p><strong>Total Pembayaran:</strong> Rp.
                            {{ number_format($angsuran_per_bulan * $kontrak->tenor, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-header">
                Jadwal Angsuran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle text-center">
                        <thead>
                            <tr>
                                <th>Angsuran Ke</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Jumlah Angsuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalAngsuran as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->angsuran_ke }}</td>
                                    <td>{{ date('d-m-Y', strtotime($jadwal->tanggal_jatuh_tempo)) }}</td>
                                    <td>Rp. {{ number_format($jadwal->angsuran_per_bulan, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('kredit.index') }}" class="btn btn-secondary">Hitung Lagi</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
