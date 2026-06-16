<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Barang - TEMUIN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background: #f8f9fa;
            color: #212529;
            padding-top: 110px; /* Jarak aman dari top navbar */
            padding-bottom: 80px;
            -webkit-font-smoothing: antialiased;
        }

        /* 🧭 TOP NAVBAR (Konsisten dengan Detail & Beranda) */
        .desktop-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            z-index: 999;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
            height: 76px;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: #2f6f44;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-menu-wrapper {
            display: flex;
            gap: 8px;
            height: 100%;
        }

        .nav-item {
            text-decoration: none;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 600;
            padding: 0 20px;
            position: relative;
            transition: color 0.2s;
        }

        .nav-item:hover {
            color: #2f6f44;
        }

        .nav-item.active {
            color: #2f6f44;
        }

        .nav-item.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 3px;
            background: #2f6f44;
            border-radius: 3px 3px 0 0;
        }

        /* 📁 CONTAINER UTAMA */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            text-decoration: none;
            color: #6c757d;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.2s;
        }

        .back:hover {
            color: #2f6f44;
        }

        /* 💻 SPLIT LAYOUT DESKTOP */
        .card {
            background: white;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #e9ecef;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 48px;
        }

        /* Bagian Info Kiri */
        .info-side {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border-right: 1px solid #e9ecef;
            padding-right: 24px;
        }

        .title {
            font-size: 36px;
            font-weight: 800;
            color: #121416;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: #6c757d;
            margin-bottom: 32px;
            line-height: 1.6;
            font-size: 15px;
        }

        .item-box {
            background: #eef9f1;
            border: 1px solid #d8edd3;
            padding: 24px;
            border-radius: 16px;
            margin-top: auto;
        }

        .item-label {
            font-size: 12px;
            color: #2f6f44;
            margin-bottom: 8px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .item-name {
            font-size: 26px;
            font-weight: 800;
            color: #245534;
            line-height: 1.3;
        }

        /* Bagian Form Kanan */
        .form-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #495057;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #ced4da;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
            background: #f8f9fa;
            transition: all 0.2s;
        }

        textarea {
            min-height: 140px;
            resize: none;
            line-height: 1.5;
        }

        input:focus,
        textarea:focus {
            border-color: #2f6f44;
            background: white;
            box-shadow: 0 0 0 4px rgba(47, 111, 68, 0.1);
        }

        .btn {
            width: 100%;
            background: #2f6f44;
            color: white;
            border: none;
            padding: 18px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            margin-top: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(47, 111, 68, 0.2);
        }

        .btn:hover {
            background: #245534;
        }

        .btn:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>

<div class="desktop-navbar">
    <div class="nav-container">
        <a href="/dashboard" class="logo">TEMUIN</a>
        <div class="nav-menu-wrapper">
            <a href="/dashboard" class="nav-item active">🏠 Beranda</a>
            <a href="/report" class="nav-item">📸 Lapor</a>
            <a href="/dashboard/account" class="nav-item">👤 Akun</a>
        </div>
    </div>
</div>

<div class="container">

    <a href="{{ url()->previous() }}" class="back">
        &larr; Kembali ke Detail Temuan
    </a>

    <div class="card">

        <div class="info-side">
            <h1 class="title">Claim Barang</h1>
            <p class="subtitle">
                Isi data dengan benar agar admin dapat memverifikasi kepemilikan barang. Tim verifikasi akan segera menghubungi Anda melalui nomor kontak yang dicantumkan.
            </p>

            <div class="item-box">
                <div class="item-label">Barang yang diklaim</div>
                <div class="item-name">{{ $item->item_name }}</div>
            </div>
        </div>

        <div class="form-side">
            <form action="{{ route('item.claim.store', $item->id) }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        placeholder="Contoh: 011022..."
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Nomor WhatsApp Aktif</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        placeholder="Contoh: 081234567890"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="notes">Alasan & Bukti Kepemilikan</label>
                    <textarea
                        id="notes"
                        name="notes"
                        placeholder="Contoh: Barang ini milik saya karena memiliki stiker khusus di pojok kanan belakang dan saya kehilangannya sekitar jam 2 siang kemarin..."
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn">
                    📦 Kirim Permintaan Klaim
                </button>

            </form>
        </div>

    </div>

</div>

</body>
</html>
