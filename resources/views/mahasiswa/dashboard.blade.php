<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TEMUIN</title>

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
        padding-top: 100px; /* Memberi ruang untuk sticky navbar */
        -webkit-font-smoothing: antialiased;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 24px 80px 24px;
    }

    /* 🧭 NAVBAR PREMIUM DESKTOP */
    .bottom-nav {
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

    .icon {
        font-size: 18px;
    }

    /* 🏛️ HERO SPLIT LAYOUT (Khusus Desktop) */
    .hero-section {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 60px;
        align-items: center;
        padding: 40px 0 60px 0;
        border-bottom: 1px solid #e9ecef;
        margin-bottom: 40px;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        background: #eef9f1;
        color: #2f6f44;
        padding: 6px 16px;
        border-radius: 99px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .title {
        font-size: 44px;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 16px;
        letter-spacing: -1px;
        color: #121416;
    }

    .subtitle {
        color: #6c757d;
        font-size: 16px;
        line-height: 1.6;
    }

    /* 🔍 SEARCH & FILTER BOX (Sisi Kanan Desktop) */
    .filter-panel {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        border: 1px solid #e9ecef;
    }

    .search-container {
        display: flex;
        gap: 10px;
        margin-bottom: 24px;
    }

    .search-box {
        flex: 1;
        padding: 16px 20px;
        border: 1px solid #ced4da;
        border-radius: 12px;
        background: #f8f9fa;
        font-size: 15px;
        outline: none;
        transition: all 0.2s;
    }

    .search-box:focus {
        border-color: #2f6f44;
        background: white;
        box-shadow: 0 0 0 4px rgba(47, 111, 68, 0.1);
    }

    .btn-search {
        border: none;
        background: #2f6f44;
        color: white;
        border-radius: 12px;
        padding: 0 28px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-search:hover {
        background: #245534;
    }

    .filter-section-title {
        font-size: 11px;
        font-weight: 700;
        color: #adb5bd;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .category-scroll, .date-filter-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .date-filter-wrapper {
        margin-bottom: 0;
    }

    .category-scroll a, .date-item {
        text-decoration: none;
        background: white;
        color: #495057;
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid #dee2e6;
        cursor: pointer;
        transition: all 0.15s;
    }

    .category-scroll a:hover, .date-item:hover {
        border-color: #2f6f44;
        color: #2f6f44;
        background: #fafafa;
    }

    .category-scroll a.active, .date-item.active {
        background: #2f6f44;
        color: white;
        border-color: #2f6f44;
    }

    .date-input-container {
        display: inline-block;
    }

    .native-date-picker {
        padding: 7px 12px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        background: white;
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        outline: none;
        cursor: pointer;
    }

    /* 📅 SECTION MAIN CONTENT */
    .main-content-section {
        display: flex;
        flex-direction: column;
    }

    .section-title {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 24px;
        color: #121416;
        letter-spacing: -0.5px;
    }

    /* 🎴 GRID & CARDS (Simetris Sempurna) */
    .items-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border: 1px solid #e9ecef;
        transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.06);
    }

    .card-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .image-wrapper {
        width: 100%;
        aspect-ratio: 4 / 3; /* Memastikan rasio gambar seragam di semua ukuran desktop */
        position: relative;
        background: #e9ecef;
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-photo {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #868e96;
        font-size: 14px;
        font-weight: 600;
        background: #f1f3f5;
    }

    .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: space-between;
    }

    .item-name {
        font-size: 16px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 12px;
        color: #121416;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 44px;
    }

    .meta-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 16px;
    }

    .meta {
        color: #495057;
        font-size: 13px;
        display: flex;
        align-items: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .status {
        display: inline-flex;
        background: #eef9f1;
        color: #2f6f44;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        align-self: flex-start;
    }

    .empty {
        background: white;
        padding: 80px 20px;
        text-align: center;
        border-radius: 20px;
        grid-column: span 4;
        color: #6c757d;
        font-size: 16px;
        border: 1px solid #e9ecef;
    }

    /* 🟩 MODAL SUCCESS */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(18, 20, 22, 0.4);
        backdrop-filter: blur(4px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-box {
        background: white;
        width: 100%;
        max-width: 400px;
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        animation: pop .3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .modal-icon {
        font-size: 64px;
        margin-bottom: 20px;
    }

    .modal-box h3 {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .modal-box p {
        color: #495057;
        margin-bottom: 28px;
        line-height: 1.6;
        font-size: 15px;
    }

    .modal-btn {
        border: none;
        background: #2f6f44;
        color: white;
        padding: 14px 20px;
        border-radius: 12px;
        cursor: pointer;
        width: 100%;
        font-weight: 700;
        font-size: 15px;
        transition: background 0.2s;
    }

    .modal-btn:hover {
        background: #245534;
    }

    .item-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 12px;
    }

   .tag-badge {
        display: inline-flex;
        align-items: center;
        background: #eef9f1;
        color: #2f6f44;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
    }

    @keyframes pop {
        from { transform: scale(.92); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

</style>
</head>
<body>

<div class="bottom-nav">
    <div class="nav-container">
        <div class="logo">TEMUIN</div>
        <div class="nav-menu-wrapper">
            <a href="/dashboard" class="nav-item active">
                <div class="icon">🏠</div>
                Beranda
            </a>
            <a href="/report" class="nav-item">
                <div class="icon">📸</div>
                Lapor
            </a>
            <a href="/dashboard/account" class="nav-item">
                <div class="icon">👤</div>
                Akun
            </a>
        </div>
    </div>
</div>

<div class="container">
    @if(session('success'))
    <div id="successModal" class="modal-overlay">
        <div class="modal-box">
            <div class="modal-icon">✅</div>
            <h3>Berhasil!</h3>
            <p>{{ session('success') }}</p>
            <button onclick="closeModal()" class="modal-btn">Oke</button>
        </div>
    </div>
    @endif

    <div class="hero-section">
        <div>
            <div class="badge">#1 Platform Kehilangan Kampus 🎓</div>
            <div class="title">Cari Barangmu <br>Sederhana & Cepat.</div>
            <div class="subtitle">Barang yang ditemukan mahasiswa dan satpam kampus akan muncul di sini secara real-time. Laporkan jika Anda menemukan sesuatu!</div>
        </div>

        <div class="filter-panel">
            <form method="GET" action="/dashboard" id="filterForm">

                <div class="search-container">
                    <input
                        type="text"
                        name="search"
                        placeholder="Cari dompet, laptop, kunci..."
                        class="search-box"
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="btn-search">Cari</button>
                </div>

                <input type="hidden" name="category_id" id="cat_holder" value="{{ request('category_id') }}">
                <input type="hidden" name="date_filter" id="date_holder" value="{{ request('date_filter', 'today') }}">

                <div class="filter-section-title">Kategori</div>
                <div class="category-scroll">
                    <a href="javascript:void(0)" class="cat-trigger {{ request('category_id') ? '' : 'active' }}" data-id="">
                        Semua
                    </a>
                    @foreach($categories as $cat)
                        <a href="javascript:void(0)" class="cat-trigger {{ request('category_id') == $cat->id ? 'active' : '' }}" data-id="{{ $cat->id }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>

                <div class="filter-section-title">Waktu Temuan</div>
                <div class="date-filter-wrapper">
                    <button type="button" class="date-trigger date-item {{ request('date_filter', 'today') == 'today' ? 'active' : '' }}" data-value="today">
                        Hari Ini
                    </button>
                    <button type="button" class="date-trigger date-item {{ request('date_filter') == 'all' ? 'active' : '' }}" data-value="all">
                        Semua Hari
                    </button>
                    <div class="date-input-container">
                        <input
                            type="date"
                            name="custom_date"
                            id="custom_date_picker"
                            class="native-date-picker"
                            value="{{ request('custom_date') }}"
                            onchange="triggerCustomDate(this.value)"
                        >
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="main-content-section">
        <div class="section-title">
            @if(request('date_filter', 'today') == 'today' && !request('custom_date'))
                Barang Temuan Hari Ini 🗓️
            @else
                Hasil Penelusuran Barang
            @endif
        </div>

        <div class="grid-container">
            @php
                $filteredItems = $items;

                if (request('custom_date')) {
                    $targetDate = request('custom_date');
                    $filteredItems = $items->filter(function($item) use ($targetDate) {
                        return \Carbon\Carbon::parse($item->found_at)->format('Y-m-d') === $targetDate;
                    });
                } elseif (request('date_filter', 'today') == 'today') {
                    $todayDate = \Carbon\Carbon::today()->format('Y-m-d');
                    $filteredItems = $items->filter(function($item) use ($todayDate) {
                        return \Carbon\Carbon::parse($item->found_at)->format('Y-m-d') === $todayDate;
                    });
                }

                if (request('category_id')) {
                    $filteredItems = $filteredItems->filter(function($item) {
                        return $item->category_id == request('category_id');
                    });
                }
            @endphp

            @if($filteredItems->count())
            <div class="items-grid">
                @foreach($filteredItems as $item)
                    <div class="card">
                        <a href="/item/{{ $item->id }}" class="card-link">
                            <div class="image-wrapper">
                                @if($item->photo)
                                    <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->item_name }}">
                                @else
                                    <div class="no-photo">📸 No Photo</div>
                                @endif
                            </div>

                            <div class="card-body">
                            <div>

                                <div class="item-name">
                                    {{ $item->item_name }}
                                </div>

                                @if($item->tags->count())
                                    <div class="item-tags">
                                        @foreach($item->tags as $tag)
                                            <span class="tag-badge">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="meta-group">
                                    <div class="meta">
                                        📍 {{ $item->location_found }}
                                    </div>

                                    <div class="meta">
                                        🕒 {{ \Carbon\Carbon::parse($item->found_at)->format('d M H:i') }}
                                    </div>
                                </div>

                            </div>

                            <div class="status">
                                {{ $item->status }}
                            </div>
                        </div>

                        </a>
                    </div>
                @endforeach
            </div>
            @else
                <div class="empty">
                    @if(request('search'))
                        Tidak ada barang dengan kata kunci <b>"{{ request('search') }}"</b> pada filter waktu yang dipilih.
                    @else
                        Tidak ada barang temuan untuk filter waktu ini.
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('filterForm');
    const catHolder = document.getElementById('cat_holder');
    const dateHolder = document.getElementById('date_holder');
    const customDatePicker = document.getElementById('custom_date_picker');

    document.querySelectorAll('.cat-trigger').forEach(trigger => {
        trigger.addEventListener('click', function() {
            catHolder.value = this.getAttribute('data-id');
            form.submit();
        });
    });

    document.querySelectorAll('.date-trigger').forEach(trigger => {
        trigger.addEventListener('click', function() {
            dateHolder.value = this.getAttribute('data-value');
            customDatePicker.value = "";
            form.submit();
        });
    });

    function triggerCustomDate(val) {
        if(val) {
            dateHolder.value = "custom";
            form.submit();
        }
    }

    function closeModal(){
        document.getElementById('successModal').remove();
    }

    setTimeout(() => {
        const modal = document.getElementById('successModal');
        if(modal){
            modal.remove();
        }
    }, 4000);
</script>

</body>
</html>