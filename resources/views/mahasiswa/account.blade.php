<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - TEMUIN</title>

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
            padding-top: 110px; /* Jarak aman agar tidak tertutup navbar desktop */
            padding-bottom: 80px;
            -webkit-font-smoothing: antialiased;
        }

        /* 🧭 TOP NAVBAR (Konsisten dengan Beranda & Detail) */
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

        /* 📁 CONTAINER PROFILE DESKTOP */
        .container {
            max-width: 680px; /* Lebar optimal untuk layout kartu profil terpusat */
            margin: auto;
            padding: 0 24px;
        }

        /* 💳 KARTU PROFIL UTAMA */
        .profile-card {
            background: white;
            border-radius: 24px;
            padding: 48px 32px;
            text-align: center;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #e9ecef;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #eef9f1;
            border: 1px solid #d8edd3;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 42px;
            box-shadow: 0 8px 20px rgba(47, 111, 68, 0.06);
        }

        .name {
            margin-top: 24px;
            font-size: 28px;
            font-weight: 800;
            color: #121416;
            text-transform: capitalize;
            letter-spacing: -0.5px;
        }

        .email-sub {
            color: #6c757d;
            margin-top: 8px;
            font-size: 15px;
        }

        /* 📄 MENU DATA DETAIL AKUN */
        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 32px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #e9ecef;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 28px;
            text-decoration: none;
            color: #212529;
            border-bottom: 1px solid #f1f3f5;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-item span {
            color: #495057;
            font-size: 14px;
            font-weight: 600;
        }

        .menu-item strong {
            font-size: 15px;
            color: #121416;
            font-weight: 700;
        }

        .role-badge {
            background: #2f6f44;
            color: white !important;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 11px !important;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        /* 🛑 TOMBOL KELUAR APLIKASI DESKTOP */
        .logout-btn {
            display: block;
            width: 100%;
            background: #fff5f5;
            color: #c53030;
            border: 1px solid #feb2b2;
            border-radius: 14px;
            padding: 18px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            box-shadow: 0 4px 12px rgba(197, 48, 48, 0.02);
        }

        .logout-btn:hover {
            background: #c53030;
            color: white;
            border-color: #c53030;
            box-shadow: 0 8px 20px rgba(197, 48, 48, 0.15);
        }

        .logout-btn:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>

    <div class="desktop-navbar">
        <div class="nav-container">
            <a href="/dashboard" class="logo">TEMUIN</a>
            <div class="nav-menu-wrapper">
                <a href="/dashboard" class="nav-item">🏠 Beranda</a>
                <a href="/report" class="nav-item">📸 Lapor</a>
                <a href="/dashboard/account" class="nav-item active">👤 Akun</a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="profile-card">
            <div class="avatar">🎓</div>
            <div class="name">{{ auth()->user()->name }}</div>
            <div class="email-sub">{{ auth()->user()->email }}</div>
        </div>

        <div class="menu-card">
            <div class="menu-item">
                <span>Hak Akses Akun</span>
                <strong class="role-badge">
                    {{ strtoupper(auth()->user()->role) }}
                </strong>
            </div>

            <div class="menu-item">
                <span>Email Terdaftar</span>
                <strong>{{ auth()->user()->email }}</strong>
            </div>

            <div class="menu-item">
                <span>Waktu Bergabung</span>
                <strong>{{ auth()->user()->created_at ? auth()->user()->created_at->format('d M Y') : '-' }}</strong>
            </div>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="logout-btn">
                🚪 Keluar dari Aplikasi TEMUIN
            </button>
        </form>

    </div>

</body>
</html>
