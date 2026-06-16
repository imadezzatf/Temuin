<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Barang Hilang - TEMUIN</title>
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
            padding-top: 110px; /* Jarak aman agar tidak tertutup navbar desktop */
            padding-bottom: 80px;
            -webkit-font-smoothing: antialiased;
        }

        /* 🧭 TOP NAVBAR (Konsisten dengan halaman Beranda, Detail, & Akun) */
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

        /* 📁 CONTAINER MAIN SPLIT LAYOUT DESKTOP */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
        }

        /* 💻 CARD GRID UTAMA */
        .card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #e9ecef;
            display: grid;
            grid-template-columns: 1fr 1.2fr; /* Sisi kiri kamera, sisi kanan form */
            gap: 48px;
            min-height: 580px;
            align-items: start;
        }

        /* Bagian Kiri: Header + Kamera */
        .left-side {
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 130px; /* Ikut melayang mengikuti scroll desktop jika form panjang */
        }

        .form-header {
            text-align: left;
            margin-bottom: 24px;
        }

        h2 {
            color: #121416;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.5;
        }

        /* 📸 AREA BOX KAMERA LIVE VIEW */
        .camera-container {
            width: 100%;
            aspect-ratio: 4 / 3;
            background: #121416;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.6);
            border: 1px solid #ced4da;
        }

        #webcam-stream {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #photo-preview {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Agar hasil jepretan terlihat penuh tanpa terpotong */
            display: none;
        }

        /* Shutter Overlay */
        .shutter-overlay {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .btn-shutter {
            width: 62px;
            height: 62px;
            background: white;
            border: 5px solid rgba(47, 111, 68, 0.4);
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            transition: transform 0.1s ease, background-color 0.2s;
        }

        .btn-shutter:hover {
            background: #f1f3f5;
        }

        .btn-shutter:active {
            transform: scale(0.9);
        }

        /* Tombol ganti/foto ulang */
        .btn-retake {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(18, 20, 22, 0.8);
            backdrop-filter: blur(4px);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: none;
            z-index: 11;
            transition: background 0.2s;
        }

        .btn-retake:hover {
            background: rgba(18, 20, 22, 0.95);
        }

        /* Bagian Kanan: Form input */
        .right-side {
            display: flex;
            flex-direction: column;
        }

        /* 📝 KONTEN INPUTAN FORM (Tampil dengan transisi slide halus) */
        #dynamic-form-fields {
            display: none;
            animation: slideLeft 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideLeft {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Tampilan Placeholder Sebelum Memotret */
        .form-placeholder-msg {
            display: flex;
            flex-content: center;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            border: 2px dashed #dee2e6;
            border-radius: 20px;
            padding: 60px 40px;
            color: #868e96;
            min-height: 400px;
        }

        .form-placeholder-msg icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        label {
            font-weight: 700;
            font-size: 13px;
            color: #495057;
            display: block;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"], select, textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #ced4da;
            border-radius: 12px;
            background: #f8f9fa;
            font-size: 15px;
            color: #212529;
            outline: none;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus, select:focus, textarea:focus {
            border-color: #2f6f44;
            background: white;
            box-shadow: 0 0 0 4px rgba(47, 111, 68, 0.1);
        }

        textarea {
            resize: none;
            line-height: 1.5;
        }

        .btn-submit {
            background: #2f6f44;
            color: white;
            border: none;
            padding: 18px;
            border-radius: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 700;
            margin-top: 12px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(47, 111, 68, 0.2);
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background: #245534;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 24px;
            color: #6c757d;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: #2f6f44;
        }
    </style>
</head>
<body>

    <div class="desktop-navbar">
        <div class="nav-container">
            <a href="/dashboard" class="logo">TEMUIN</a>
            <div class="nav-menu-wrapper">
                <a href="/dashboard" class="nav-item">🏠 Beranda</a>
                <a href="/report" class="nav-item active">📸 Lapor</a>
                <a href="/dashboard/account" class="nav-item">👤 Akun</a>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('report.store') }}" method="POST">
            @csrf
            <input type="hidden" name="photo_base64" id="photo_base64_holder">

            <div class="card">

                <!-- KIRI: Modul Kamera Kendali Utama -->
                <div class="left-side">
                    <div class="form-header">
                        <h2>Lapor Temuan</h2>
                        <div class="subtitle" id="status-instruction">Arahkan kamera ke objek barang lalu tekan tombol rana bulat di bawah ini.</div>
                    </div>

                    <div class="camera-container">
                        <video id="webcam-stream" autoplay playsinline></video>
                        <img id="photo-preview" alt="Pratinjau Barang Hilang">

                        <div class="shutter-overlay" id="shutter-zone">
                            <button type="button" class="btn-shutter" onclick="captureLivePhoto()"></button>
                        </div>

                        <button type="button" class="btn-retake" id="retake-trigger" onclick="resetLiveCamera()">🔄 Foto Ulang</button>
                    </div>

                    <canvas id="conversion-canvas" style="display: none;"></canvas>

                    <a href="javascript:void(0);" onclick="window.history.back();" class="btn-back">
                        ✕ Batal & Kembali
                    </a>
                </div>

                <!-- KANAN: Isian Parameter Atribut Barang -->
                <div class="right-side">

                    <!-- Kondisi Sebelum Ambil Gambar -->
                    <div id="form-placeholder" class="form-placeholder-msg">
                        <span style="font-size: 40px; margin-bottom: 12px;">📸</span>
                        <p style="font-weight: 700; color: #495057; margin-bottom: 4px;">Formulir Dikunci</p>
                        <p style="font-size: 13px; max-width: 280px; line-height: 1.4;">Harap ambil foto objek barang temuan terlebih dahulu untuk membuka isian laporan.</p>
                    </div>

                    <!-- Kondisi Sesudah Ambil Gambar -->
                    <div id="dynamic-form-fields">
                        <div class="form-group">
                            <label>Nama Barang *</label>
                            <input type="text" name="item_name" placeholder="Contoh: Dompet Kulit Hitam" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Kategori *</label>
                                <select name="category_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Ditemukan *</label>
                                <input type="text" name="location_found" placeholder="Contoh: Kantin Lt. 2 / Masjid" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Tag / Ciri Barang
                            </label>

                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <label class="flex items-center gap-2 px-3 py-2 rounded-full border border-green-200 bg-green-50 cursor-pointer">
                                        <input
                                            type="checkbox"
                                            name="tags[]"
                                            value="{{ $tag->id }}"
                                        >

                                        <span>{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Titip di Pos Satpam Mana? *</label>
                            <select name="security_post_id" required>
                                <option value="">-- Pilih Pos Satpam --</option>
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}">{{ $post->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Pelapor *</label>
                                <input type="text" name="reporter_name" placeholder="Contoh: Budi" required>
                            </div>

                            <div class="form-group">
                                <label>No. HP Pelapor *</label>
                                <input type="text" name="reporter_phone" placeholder="Contoh: 0812345..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ciri Tambahan / Catatan</label>
                            <textarea name="description" rows="4" placeholder="Contoh: Ada gantungan kunci kodok warna hijau atau robek tipis di bagian dalam..." required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">Kirim Laporan Skuyy ✨</button>
                    </div>

                </div>

            </div>
        </form>
    </div>

<script>
    const videoStream = document.getElementById('webcam-stream');
    const photoPreview = document.getElementById('photo-preview');
    const conversionCanvas = document.getElementById('conversion-canvas');
    const shutterZone = document.getElementById('shutter-zone');
    const retakeTrigger = document.getElementById('retake-trigger');
    const formPlaceholder = document.getElementById('form-placeholder');
    const dynamicFormFields = document.getElementById('dynamic-form-fields');
    const photoBase64Holder = document.getElementById('photo_base64_holder');
    const statusInstruction = document.getElementById('status-instruction');
    let activeStream = null;

    window.addEventListener('DOMContentLoaded', () => {
        initiateLiveCamera();
    });

    function initiateLiveCamera() {
        navigator.mediaDevices.getUserMedia({
            video: { facingMode: "environment" },
            audio: false
        })
        .then(stream => {
            activeStream = stream;
            videoStream.srcObject = stream;

            videoStream.style.display = 'block';
            photoPreview.style.display = 'none';
            shutterZone.style.display = 'block';
            retakeTrigger.style.display = 'none';
        })
        .catch(error => {
            alert("Sistem gagal memuat modul Kamera Live. Pastikan izin akses kamera pada peramban web Anda diaktifkan.");
            console.error(error);
        });
    }

    function captureLivePhoto() {
        if (!activeStream) return;

        conversionCanvas.width = videoStream.videoWidth;
        conversionCanvas.height = videoStream.videoHeight;

        const drawContext = conversionCanvas.getContext('2d');
        drawContext.drawImage(videoStream, 0, 0, conversionCanvas.width, conversionCanvas.height);

        const base64Data = conversionCanvas.toDataURL('image/jpeg', 0.9);
        photoBase64Holder.value = base64Data;

        photoPreview.src = base64Data;
        photoPreview.style.display = 'block';
        videoStream.style.display = 'none';

        activeStream.getTracks().forEach(track => track.stop());

        shutterZone.style.display = 'none';
        retakeTrigger.style.display = 'block';
        statusInstruction.innerText = "Foto berhasil diambil! Selesaikan pengisian formulir di sebelah kanan untuk mengirim laporan.";

        formPlaceholder.style.display = 'none';
        dynamicFormFields.style.display = 'block';
    }

    function resetLiveCamera() {
        dynamicFormFields.style.display = 'none';
        formPlaceholder.style.display = 'flex';
        statusInstruction.innerText = "Arahkan kamera ke objek barang lalu tekan tombol rana bulat di bawah ini.";
        photoBase64Holder.value = "";
        initiateLiveCamera();
    }
</script>

</body>
</html>