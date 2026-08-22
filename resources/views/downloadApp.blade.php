<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPERA Mobile - Sistem Pengaduan Digital Polres Malang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f0f4f9;
            color: #1f2937;
        }

        /* ============ NAVBAR ============ */
        .navbar-custom {
            background: linear-gradient(135deg, #0a2a5e, #1769d1);
            padding: 12px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-weight: 700;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-custom .navbar-brand img {
            height: 40px;
            width: auto;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.2));
        }

        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.85);
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .navbar-custom .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .navbar-custom .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* ============ HERO / HEADER ============ */
        .hero-section {
            background: linear-gradient(135deg, #0f3d91 0%, #1a6fd6 50%, #3b8cff 100%);
            padding: 50px 0 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,0.15);
            padding: 5px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-size: 38px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .hero-title span {
            color: #ffd966;
        }

        .hero-desc {
            font-size: 16px;
            opacity: 0.9;
            max-width: 520px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .hero-stats {
            display: flex;
            gap: 30px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .hero-stats .stat-item {
            text-align: center;
        }

        .hero-stats .stat-number {
            font-size: 24px;
            font-weight: 700;
        }

        .hero-stats .stat-label {
            font-size: 12px;
            opacity: 0.75;
        }

        /* ============ HP MOCKUP ============ */
        .hp-mockup {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hp-mockup img {
            width: 260px;
            height: auto;
            border-radius: 20px;
            box-shadow: 
                0 20px 60px rgba(0,0,0,0.25),
                0 0 0 6px rgba(255,255,255,0.1);
            transition: all 0.5s ease;
        }

        .hp-mockup img:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 70px rgba(0,0,0,0.3);
        }

        /* ============ SECTION UMUM ============ */
        .section-padding {
            padding: 50px 0;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #0a2a5e;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #64748b;
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.7;
        }

        .section-divider {
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, #1769d1, #3b8cff);
            border-radius: 4px;
            margin: 0 auto 16px;
        }

        /* ============ FEATURES ============ */
        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 25px 20px;
            text-align: center;
            height: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.35s ease;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(23, 105, 209, 0.12);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e8f1ff, #d4e4ff);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            font-size: 24px;
            color: #1769d1;
        }

        .feature-card h5 {
            font-weight: 700;
            font-size: 17px;
            color: #0a2a5e;
            margin-bottom: 6px;
        }

        .feature-card p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }

        /* ============ TENTANG / ABOUT ============ */
        .about-section {
            background: white;
        }

        .about-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .about-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 14px;
        }

        .about-list li:last-child {
            border-bottom: none;
        }

        .about-list i {
            width: 32px;
            height: 32px;
            background: #e8f1ff;
            color: #1769d1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        /* ============ DOWNLOAD SECTION ============ */
        .download-section {
            background: linear-gradient(135deg, #f8faff, #edf3fa);
        }

        .download-card-main {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(0,0,0,0.03);
        }

        .qr-box {
            width: 180px;
            height: 180px;
            margin: 0 auto;
            padding: 12px;
            background: white;
            border: 2px dashed #dce3ed;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .download-btn-main {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #1769d1, #0f3d91);
            color: white;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            font-size: 15px;
        }

        .download-btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(23, 105, 209, 0.3);
            color: white;
        }

        .download-btn-main i {
            font-size: 16px;
        }

        .version-tag {
            display: inline-block;
            background: #e8f1ff;
            color: #1769d1;
            padding: 3px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
        }

        .warning-box-download {
            margin-top: 16px;
            padding: 12px 16px;
            background: #fff8e6;
            border: 1px solid #fde68a;
            border-radius: 10px;
            color: #92400e;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .warning-box-download i {
            font-size: 14px;
        }

        /* ============ LOGO HERO ============ */
        .hero-logo-wrapper {
            text-align: center;
        }

        .hero-logo {
            width: 150px;
            filter: drop-shadow(0 8px 30px rgba(0,0,0,0.3));
            transition: all 0.3s ease;
        }

        .hero-logo:hover {
            transform: scale(1.05);
        }

        /* ============ FOOTER ============ */
        .footer-custom {
            background: #0a1e3d;
            color: rgba(255,255,255,0.7);
            padding: 30px 0 16px;
        }

        .footer-custom h5 {
            color: white;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 14px;
        }

        .footer-custom a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
        }

        .footer-custom a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 16px;
            margin-top: 24px;
            text-align: center;
            font-size: 13px;
        }

        /* ============================================================ */
        /* ============ RESPONSIVE - Mobile First ============ */
        /* ============================================================ */

        /* Tablet & Mobile */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 30px;
                text-align: center;
            }

            .hero-desc {
                max-width: 100%;
                text-align: center;
                font-size: 15px;
            }

            .hero-badge {
                display: block;
                text-align: center;
                width: fit-content;
                margin: 0 auto 14px;
            }

            .hero-stats {
                justify-content: center;
                gap: 20px;
            }

            .hero-stats .stat-number {
                font-size: 20px;
            }

            /* Logo hero di mobile - lebih kecil */
            .hero-logo {
                width: 120px;
                margin-top: 20px;
            }

            .hero-logo-wrapper {
                margin-top: 10px;
            }

            /* HP Mockup di mobile */
            .hp-mockup img {
                width: 200px;
            }

            /* Section */
            .section-padding {
                padding: 35px 0;
            }

            .section-title {
                font-size: 24px;
            }

            .section-subtitle {
                font-size: 14px;
                padding: 0 15px;
            }

            /* Download card */
            .download-card-main {
                padding: 20px;
            }

            .qr-box {
                width: 160px;
                height: 160px;
            }

            /* About list */
            .about-list li {
                font-size: 13px;
                padding: 8px 0;
            }

            .about-list i {
                width: 28px;
                height: 28px;
                font-size: 12px;
            }

            .warning-box-download {
                font-size: 11px;
                padding: 10px 14px;
                display: block;
                text-align: center;
            }
        }

        /* Mobile Kecil */
        @media (max-width: 576px) {
            .hero-section {
                padding: 30px 0 25px;
            }

            .hero-title {
                font-size: 26px;
            }

            .hero-desc {
                font-size: 14px;
            }

            .hero-stats .stat-number {
                font-size: 18px;
            }

            .hero-stats .stat-label {
                font-size: 11px;
            }

            .hero-logo {
                width: 100px;
            }

            .hp-mockup img {
                width: 160px;
            }

            .section-title {
                font-size: 21px;
            }

            .feature-card {
                padding: 20px 16px;
            }

            .feature-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .feature-card h5 {
                font-size: 15px;
            }

            .feature-card p {
                font-size: 12px;
            }

            .download-btn-main {
                font-size: 13px;
                padding: 10px 20px;
                width: 100%;
                justify-content: center;
            }

            .qr-box {
                width: 140px;
                height: 140px;
            }

            .download-card-main {
                padding: 16px;
            }

            .footer-custom {
                padding: 20px 0 12px;
            }

            .footer-custom h5 {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .footer-custom a {
                font-size: 13px;
            }

            .footer-bottom {
                font-size: 12px;
            }
        }

        /* Layar sangat kecil */
        @media (max-width: 400px) {
            .hero-title {
                font-size: 22px;
            }

            .hero-logo {
                width: 80px;
            }

            .hp-mockup img {
                width: 140px;
            }

            .hero-stats {
                gap: 12px;
            }

            .hero-stats .stat-number {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- ============ NAVBAR ============ -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/Logo_Polres_Malang.png') }}" alt="Logo Polres Malang">
                SIPERA Mobile
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#unduh">Unduh</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ============ HERO ============ -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <!-- KIRI: Teks -->
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <i class="fas fa-shield-alt me-2"></i> Sistem Polres Malang
                    </div>
                    <h1 class="hero-title">
                        SIPERA <span>Mobile</span>
                    </h1>
                    <p class="hero-desc">
                        Sistem Pelaporan Masyarakat Polres Malang — solusi cepat, aman, dan transparan
                        untuk menyampaikan pengaduan serta memantau informasi kepolisian.
                    </p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Laporan Diproses</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Tingkat Respons</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Layanan Aktif</div>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Logo Polres Malang -->
                <div class="col-lg-5 hero-logo-wrapper">
                    <img 
                        src="{{ asset('images/Logo_Polres_Malang.png') }}" 
                        alt="Logo Polres Malang" 
                        class="hero-logo"
                    >
                </div>
            </div>
        </div>
    </section>

    <!-- ============ TENTANG ============ -->
    <section class="about-section section-padding" id="tentang">
        <div class="container">
            <div class="text-center">
                <div class="section-divider"></div>
                <h2 class="section-title">Tentang SIPERA Mobile</h2>
                <p class="section-subtitle">
                    Aplikasi pendukung Sistem Pelaporan Polres Malang yang dirancang
                    untuk memudahkan masyarakat dalam berinteraksi dengan layanan kepolisian.
                </p>
            </div>

            <!-- LAYOUT: HP DI KIRI, TEKS DI KANAN -->
            <div class="row align-items-center g-4 mt-2">
                <!-- KIRI: HP SCREENSHOT -->
                <div class="col-lg-6 text-center hp-mockup">
                    <img src="{{ asset('images/APP_Sipera_Banner.png') }}" alt="Tampilan Aplikasi SIPERA Mobile">
                </div>

                <!-- KANAN: Penjelasan + List -->
                <div class="col-lg-6">
                    <h4 style="color:#0a2a5e; font-weight:700; font-size:20px; margin-bottom:6px;">
                        <i class="fas fa-circle-check" style="color:#1769d1; margin-right:10px;"></i>
                        Mengapa SIPERA Mobile?
                    </h4>
                    <p style="color:#475569; line-height:1.7; font-size:15px; margin-bottom:16px;">
                        SIPERA Mobile hadir sebagai jembatan antara masyarakat dan Polres Malang.
                        Dengan aplikasi ini, pengaduan dapat disampaikan kapan saja dan di mana saja,
                        serta dipantau secara real-time.
                    </p>

                    <ul class="about-list">
                        <li><i class="fas fa-clock"></i> Pengaduan cepat dan responsif</li>
                        <li><i class="fas fa-map-pin"></i> Integrasi lokasi untuk akurasi</li>
                        <li><i class="fas fa-history"></i> Riwayat pengaduan lengkap</li>
                        <li><i class="fas fa-bell"></i> Notifikasi status terbaru</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FITUR ============ -->
    <section class="section-padding" id="fitur" style="background:#f8faff;">
        <div class="container">
            <div class="text-center">
                <div class="section-divider"></div>
                <h2 class="section-title">Fitur Unggulan</h2>
                <p class="section-subtitle">
                    Berbagai kemudahan yang tersedia dalam aplikasi SIPERA Mobile
                    untuk mendukung pelaporan masyarakat.
                </p>
            </div>

            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-pen-to-square"></i></div>
                        <h5>Pengajuan Pengaduan</h5>
                        <p>Kirimkan laporan atau pengaduan Anda.</p>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-chart-simple"></i></div>
                        <h5>Pemantauan Status</h5>
                        <p>Pantau perkembangan pengaduan secara real-time.</p>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-list-check"></i></div>
                        <h5>Riwayat Pengaduan</h5>
                        <p>Akses riwayat lengkap semua pengaduan Anda.</p>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-circle-info"></i></div>
                        <h5>Informasi Layanan</h5>
                        <p>Info terkini layanan kepolisian Polres Malang.</p>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-location-dot"></i></div>
                        <h5>Integrasi Lokasi</h5>
                        <p>Pengaduan dengan lokasi untuk respons tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ DOWNLOAD / QR ============ -->
    <section class="download-section section-padding" id="unduh">
        <div class="container">
            <div class="text-center">
                <div class="section-divider"></div>
                <h2 class="section-title">Unduh SIPERA Mobile</h2>
                <p class="section-subtitle">
                    Scan QR Code atau klik tombol di bawah untuk mengunduh aplikasi.
                </p>
            </div>

            <div class="download-card-main">
                <div class="row align-items-center g-4">
                    <!-- Left: Info -->
                    <div class="col-lg-7">
                        <h4 style="font-weight:700; color:#0a2a5e; font-size:18px;">
                            <i class="fas fa-download me-2" style="color:#1769d1;"></i>
                            Download Aplikasi
                        </h4>
                        <p style="color:#475569; line-height:1.7; font-size:14px;">
                            SIPERA Mobile tersedia untuk perangkat Android. Pastikan perangkat Anda
                            mendukung untuk pengalaman terbaik.
                        </p>

                        <ul class="about-list" style="margin-top:8px;">
                            <li><i class="fas fa-robot"></i> Android 5.0 (Lollipop) ke atas</li>
                            <li><i class="fas fa-database"></i> Ukuran aplikasi: ±25 MB</li>
                            <li><i class="fas fa-globe"></i> Bahasa: Indonesia</li>
                        </ul>

                        <div style="margin-top:20px;">
                            <a href="https://github.com/maganginformatikaumm-2026/MOBILE-APP-SISTEM-PENGADUAN-POLRES-MALANG/releases/download/v1.0.0/app-release.apk"
                               class="download-btn-main"
                               target="_blank">
                                <i class="fas fa-cloud-arrow-down"></i>
                                Download SIPERA Mobile
                            </a>

                            <div style="margin-top:10px;">
                                <span class="version-tag"><i class="fas fa-tag me-1"></i> Versi 1.0.0</span>
                                <span class="version-tag ms-2" style="background:#e8f1ff; color:#1769d1;">
                                    <i class="fab fa-android me-1"></i> Android
                                </span>
                            </div>
                        </div>

                       <!-- Warning Box -->
                        <div class="warning-box-download">
                            <i class="fas fa-triangle-exclamation"></i>
                            Proyek Magang — Aplikasi ini dikembangkan sebagai tugas magang dan 
                            tidak terhubung dengan sistem resmi Polres Malang.
                        </div>
                    </div>

                    <!-- Right: QR Code -->
                    <div class="col-lg-5 text-center">
                        <div style="font-weight:600; color:#0a2a5e; font-size:15px; margin-bottom:6px;">
                            <i class="fas fa-qrcode me-2" style="color:#1769d1;"></i>
                            Scan untuk Mengunduh
                        </div>
                        <p style="font-size:12px; color:#64748b; margin-bottom:12px;">
                            Gunakan kamera atau aplikasi QR Scanner pada perangkat Android Anda.
                        </p>

                        <div class="qr-box">
                            <img src="{{ asset('images/qr-sipera3.png') }}" alt="QR Code Download SIPERA Mobile">
                        </div>

                        <p style="font-size:11px; color:#94a3b8; margin-top:10px;">
                            <i class="fas fa-qrcode me-1"></i> Scan QR Code untuk membuka halaman download
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FOOTER ============ -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                        <img src="{{ asset('images/Logo_Polres_Malang.png') }}" alt="Logo" style="height:36px; filter: brightness(0) invert(1);">
                        <span style="color:white; font-weight:700; font-size:18px;">SIPERA Mobile</span>
                    </div>
                    <p style="font-size:13px; line-height:1.7; max-width:300px;">
                        Sistem Pelaporan Masyarakat Polres Malang — mempermudah akses layanan kepolisian.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5>Menu</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:2;">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                        <li><a href="#fitur">Fitur</a></li>
                        <li><a href="#unduh">Unduh</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5>Kontak</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:2;">
                        <li><i class="fas fa-map-pin me-2" style="width:16px;"></i> Polres Malang, Jawa Timur</li>
                        <li><i class="fas fa-phone me-2" style="width:16px;"></i> (0341) 123456</li>
                        <li><i class="fas fa-envelope me-2" style="width:16px;"></i> sipera@polresmalang.go.id</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; 2026 Polres Malang — Sistem Pelaporan Masyarakat
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>