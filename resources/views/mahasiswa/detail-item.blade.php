<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang - TEMUIN</title>
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
            padding-top: 110px; /* Jarak aman agar tidak tertutup sticky navbar */
            padding-bottom: 80px;
            -webkit-font-smoothing: antialiased;
        }

        /* 🧭 TOP NAVBAR (Konsisten & Premium) */
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

        /* Breadcrumb / Tombol Kembali */
        .header-nav {
            margin-bottom: 24px;
            display: flex;
            align-items: center;
        }

        .back-link {
            text-decoration: none;
            color: #6c757d;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #2f6f44;
        }

        /* Alert Notifikasi Sukses */
        .alert-success {
            background: #eef9f1;
            color: #2f6f44;
            padding: 16px 24px;
            border-radius: 16px;
            margin-bottom: 24px;
            font-weight: 700;
            font-size: 15px;
            border: 1px solid #d8edd3;
            box-shadow: 0 4px 12px rgba(47, 111, 68, 0.03);
        }

        /* 💻 BENTO SPLIT LAYOUT */
        .card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            border: 1px solid #e9ecef;
            display: grid;
            grid-template-columns: 1fr 1.2fr; /* Rasio grid desktop ideal */
            min-height: 600px;
        }

        /* KIRI: Area Foto */
        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            background: #e9ecef;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #868e96;
            font-size: 15px;
            font-weight: 600;
            background: #f1f3f5;
        }

        /* Badge Status Menempel di Atas Foto */
        .status-badge {
            position: absolute;
            top: 24px;
            left: 24px;
            background: #eef9f1;
            color: #2f6f44;
            padding: 8px 20px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.taken {
            background: #fde8e8;
            color: #9b1c1c;
        }

        /* KANAN: Konten Detail */
        .content {
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: white;
        }

        .category-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #2f6f44;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .title {
            font-size: 36px;
            font-weight: 800;
            line-height: 1.2;
            color: #121416;
            margin-bottom: 32px;
            letter-spacing: -0.5px;
        }

        /* 🎛️ INFO GRID DESKTOP */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .info-box {
            background: #f8f9fa;
            padding: 16px 20px;
            border-radius: 14px;
            border: 1px solid #e9ecef;
        }

        .info-box-full {
            grid-column: span 2;
            background: #eef9f1;
            border-color: #d8edd3;
        }

        .info-label {
            font-size: 11px;
            color: #868e96;
            margin-bottom: 6px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .info-box-full .info-label {
            color: #2f6f44;
        }

        .info-value {
            font-size: 15px;
            font-weight: 700;
            color: #212529;
        }

        /* Catatan / Ciri Deskripsi */
        .desc-section {
            background: #f8f9fa;
            padding: 20px 24px;
            border-radius: 16px;
            border: 1px solid #e9ecef;
            margin-bottom: 32px;
        }

        .desc-title {
            font-size: 13px;
            font-weight: 700;
            color: #495057;
            margin-bottom: 10px;
        }

        .desc-text {
            font-size: 15px;
            line-height: 1.6;
            color: #343a40;
        }

        /* 🟩 TOMBOL AKSI KLAIM DESKTOP */
        .btn-claim {
            display: block;
            background: #2f6f44;
            color: white;
            text-align: center;
            padding: 18px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 14px rgba(47, 111, 68, 0.2);
            transition: background 0.2s, transform 0.1s;
        }

        .btn-claim:hover {
            background: #245534;
        }

        .btn-claim:active {
            transform: scale(0.99);
        }

        .btn-disabled {
            display: block;
            background: #e9ecef;
            color: #adb5bd;
            text-align: center;
            padding: 18px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            cursor: not-allowed;
            pointer-events: none;
            border: 1px solid #dee2e6;
        }

        .tag-wrapper{
            display:flex;
            flex-wrap:wrap;
            gap:10px;
            margin-top:10px;
        }

        .tag-badge{
            background:#eef9f1;
            color:#2f6f44;
            border:1px solid #d8edd3;
            padding:8px 14px;
            border-radius:999px;
            font-weight:600;
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

        @if(session('success'))
            <div class="alert-success">
                🎉 {{ session('success') }}
            </div>
        @endif

        <div class="header-nav">
            <a href="/dashboard" class="back-link">&larr; Kembali ke Dashboard Beranda</a>
        </div>

        <div class="card">

            <div class="image-container">
                @if($item->photo)
                    <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->item_name }}">
                @else
                    <div class="no-photo-placeholder">
                        <span>📸 Foto tidak dilampirkan oleh pelapor</span>
                    </div>
                @endif

                <div class="status-badge {{ $item->status == 'Sudah Diambil' ? 'taken' : '' }}">
                    {{ $item->status }}
                </div>
            </div>

            <div class="content">
                <div>
                    <div class="category-label">✨ {{ $item->category->name ?? 'Umum' }}</div>
                    <div class="title">{{ $item->item_name }}</div>

                    <div class="info-grid">
                        <div class="info-box">
                            <div class="info-label">📍 LOKASI TEMUAN</div>
                            <div class="info-value">{{ $item->location_found }}</div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">🕒 WAKTU LAPOR</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($item->found_at)->format('d M Y H:i') }}</div>
                        </div>

                        <div class="info-box info-box-full">
                            <div class="info-label">🏢 LOKASI PENGAMBILAN (POS SATPAM)</div>
                            <div class="info-value">{{ $item->securityPost->name ?? $item->location_found }}</div>
                        </div>

                        @if($item->tags->count())
                        <div class="desc-section">
                            <div class="desc-title">
                                🏷 Tag / Ciri Barang
                            </div>

                            <div class="tag-wrapper">
                                @foreach($item->tags as $tag)
                                    <span class="tag-badge">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="info-box">
                            <div class="info-label">👤 NAMA PELAPOR</div>
                            <div class="info-value">{{ $item->reporter_name ?? 'Hamba Allah (Anonim)' }}</div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">📞 NO. HP PELAPOR</div>
                            <div class="info-value">{{ $item->reporter_phone ?? '-' }}</div>
                        </div>
                    </div>

                    <div class="desc-section">
                        <div class="desc-title">📝 Ciri Tambahan / Catatan Penting:</div>
                        <div class="desc-text">
                            {{ $item->description ? $item->description : 'Tidak ada catatan atau ciri khusus yang ditambahkan.' }}
                        </div>
                    </div>
                </div>

                <div>
                    @if($item->status === 'Sudah Diambil')
                        <a href="javascript:void(0);" class="btn-disabled">
                            ✓ Barang Sudah Diambil Pemilik
                        </a>
                    @else
                        <a href="{{ route('item.claim.form', $item->id) }}" class="btn-claim">
                            📦 Klaim Kepemilikan Barang Ini
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </div>

</body>
</html>