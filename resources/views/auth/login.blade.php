<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk - TEMUIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            -webkit-font-smoothing: antialiased;
        }

        /* 💻 SPLIT LAYOUT DESKTOP CONTAINER */
        .login-wrapper {
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: white;
            margin: 40px 24px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
            border: 1px solid #e9ecef;
            display: grid;
            grid-template-columns: 1fr 1.1fr; /* Membagi dua sisi: Kiri Branding, Kanan Form */
        }

        /* 🟢 SISI KIRI: BRANDING PANEL */
        .brand-side {
            background: #2f6f44;
            padding: 56px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        /* Aksen dekoratif minimalis di background */
        .brand-side::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .brand-logo {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .brand-welcome-text h2 {
            font-size: 38px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
            letter-spacing: -1px;
        }

        .brand-welcome-text p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            line-height: 1.6;
        }

        .brand-footer {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
        }

        /* ⚪ SISI KANAN: FORM LOGIN PANEL */
        .form-side {
            padding: 56px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .back-nav {
            margin-bottom: 32px;
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

        .form-header h1 {
            font-size: 32px;
            font-weight: 800;
            color: #121416;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .form-header p {
            color: #6c757d;
            font-size: 15px;
            margin-bottom: 32px;
        }

        /* Notifikasi Error */
        .error-container {
            background: #fde8e8;
            color: #9b1c1c;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid #fbd5d5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #495057;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid #ced4da;
            background: #f8f9fa;
            font-size: 15px;
            color: #212529;
            outline: none;
            transition: all 0.2s ease;
        }

        input:focus {
            border-color: #2f6f44;
            background: white;
            box-shadow: 0 0 0 4px rgba(47, 111, 68, 0.1);
        }

        button {
            width: 100%;
            border: none;
            padding: 16px;
            border-radius: 14px;
            background: #2f6f44;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(47, 111, 68, 0.2);
            transition: background 0.2s, transform 0.1s;
            margin-top: 12px;
        }

        button:hover {
            background: #245534;
        }

        button:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        <!-- Sisi Kiri: Panel Branding Visual -->
        <div class="brand-side">
            <a href="/" class="brand-logo">TEMUIN</a>

            <div class="brand-welcome-text">
                <h2>Platform Utama<br>Barang Temuan Kampus.</h2>
                <p>Dikembangkan khusus untuk mempermudah civitas akademika dalam melaporkan dan mencari barang hilang di area universitas secara transparan.</p>
            </div>

            <div class="brand-footer">
                &copy; 2026 TEMUIN . Kelompok 10.
            </div>
        </div>

        <!-- Sisi Kanan: Panel Form Input Masuk -->
        <div class="form-side">

            <div class="back-nav">
                <a href="/" class="back-link">
                    &larr; Kembali ke Beranda Utama
                </a>
            </div>

            <div class="form-header">
                <h1>Halo Mahasiswa! 👋</h1>
                <p>Masuk dulu yuk untuk mulai mencari atau mengklaim kepemilikan barang.</p>
            </div>

            @if($errors->any())
                <div class="error-container">
                    ⚠️ {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Kampus</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="contoh@student.ac.id"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan kata sandi akun"
                        required
                    >
                </div>

                <button type="submit">
                    Masuk Sekarang
                </button>
            </form>

        </div>

    </div>

</body>
</html>
