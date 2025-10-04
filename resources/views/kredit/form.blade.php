<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Kredit Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffffff 0%, #d0d0d0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #ee7575, #e10000);
            color: white;
            text-align: center;
            font-weight: 600;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background: rgb(0, 0, 0);
            border: none;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ff3e24, #e11a00);
        }

        .form-text {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .logo-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            border-radius: 8px;
            background-color: #fff;
            padding: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-center gap-3 py-4">
                        <img src="images/logoIMS.jpg" alt="Logo IMS" class="logo-img">
                        <h4 class="mb-0 text-white">Kalkulator IMS Finance</h4>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('kredit.calculate') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="client_name" class="form-label">Nama Client</label>
                                <input type="text" class="form-control form-control-lg" id="client_name"
                                    name="client_name" value="Pak Sugus" required>
                            </div>

                            <div class="mb-3">
                                <label for="otr" class="form-label">Harga OTR (Rp)</label>
                                <input type="number" class="form-control form-control-lg" id="otr" name="otr"
                                    value="240000000" required>
                                <div class="form-text">Contoh: 240000000 untuk 240 juta</div>
                            </div>

                            <div class="mb-3">
                                <label for="dp_percentage" class="form-label">Down Payment (%)</label>
                                <input type="number" class="form-control form-control-lg" id="dp_percentage"
                                    name="dp_percentage" value="20" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="tenor" class="form-label">Tenor (bulan)</label>
                                <input type="number" class="form-control form-control-lg" id="tenor" name="tenor"
                                    value="18" required>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Hitung Angsuran</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-center text-muted py-3">
                        <small>© 2025 KreditMobil.ID — Semua Hak Dilindungi</small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
