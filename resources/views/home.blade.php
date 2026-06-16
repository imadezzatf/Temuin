<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>TEMUIN - Platform Barang Hilang Kampus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            padding-top: 76px; /* Memberikan ruang untuk sticky topbar */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            -webkit-font-smoothing: antialiased;
        }

        /* 🧭 TOP NAVBAR (Konsisten dengan halaman lain) */
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

        /* 📁 CONTAINER DESKTOP GRID */
        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 60px 24px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr; /* Pembagian sisi teks kiri & kartu kanan */
            gap: 80px;
            align-items: center;
        }

        /* KIRI: Area Teks Utama */
        .hero-text-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            background: #eef9f1;
            color: #2f6f44;
            padding: 8px 18px;
            border-radius: 99px;
            width: max-content;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid #d8edd3;
        }

        .hero-text-side h1 {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #121416;
            letter-spacing: -1.5px;
        }

        .hero-text-side p {
            color: #6c757d;
            font-size: 17px;
            line-height: 1.6;
            max-width: 540px;
        }

        /* KANAN: Kartu Interaktif Navigasi */
        .cta-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
            border: 1px solid #e9ecef;
        }

        .cta-card-title {
            font-size: 20px;
            font-weight: 800;
            color: #121416;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .cta-card-desc {
            font-size: 14px;
            color: #6c757d;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        /* Wrapper Tombol Aksi */
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .btn {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 16px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            transition: background 0.2s, transform 0.1s;
        }

        .btn:active {
            transform: scale(0.99);
        }

        .btn-green {
            background: #2f6f44;
            color: white;
            box-shadow: 0 4px 14px rgba(47, 111, 68, 0.2);
        }

        .btn-green:hover {
            background: #245534;
        }

        .btn-beige {
            background: #fdf6e2;
            color: #3d2b1f;
            border: 1px solid #ecd8b4;
        }

        .btn-beige:hover {
            background: #fbf0cf;
        }
    </style>
</head>
<body>

    <div class="desktop-navbar">
        <div class="nav-container">
            <a href="/" class="logo">TEMUIN</a>
        </div>
    </div>

    <div class="container">

        <!-- Sisi Kiri: Judul dan Keterangan -->
        <div class="hero-text-side">
            <div class="badge">
                #1 Platform Kehilangan Kampus 🎓
            </div>

            <h1>
                Kehilangan<br>
                barang di Kampus?
            </h1>

            <p>
                Cek dulu di sini, siapa tahu barang berhargamu sudah aman diselamatkan.
                Mari bergabung bersama komunitas mahasiswa yang saling peduli dan bantu mengembalikan barang temuan dengan cepat.
            </p>
        </div>

        <!-- Sisi Kanan: Panel Tombol Navigasi -->
        <div class="cta-card">
            <div class="cta-card-title">Selamat Datang</div>
            <div class="cta-card-desc">Silakan pilih menu di bawah ini untuk memulai pencarian atau membuat laporan baru.</div>

            <div class="buttons">
                <a href="{{ route('login') }}" class="btn btn-green">
                     Cari Barang
                </a>

                <a href="{{ route('report.create') }}" class="btn btn-beige">
                     Laporin Barang
                </a>
            </div>
        </div>

    </div>

    {{-- SweetAlert Notifikasi Sukses Laravel --}}
    @if(session('success'))
    <script>
    Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonColor: '#2f6f44'
    })
    </script>
    @endif

</body>
</html>
