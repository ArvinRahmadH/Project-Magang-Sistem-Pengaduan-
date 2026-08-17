<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPERA Mobile - Sistem Pelaporan Polres Malang</title>

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
            height: 44px;
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
            padding: 60px 0 50px;
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
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .hero-title span {
            color: #ffd966;
        }

        .hero-desc {
            font-size: 18px;
            opacity: 0.9;
            max-width: 520px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 10px;
        }

        .hero-stats .stat-item {
            text-align: center;
        }

        .hero-stats .stat-number {
            font-size: 28px;
            font-weight: 700;
        }

        .hero-stats .stat-label {
            font-size: 13px;
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
            width: 280px;
            height: auto;
            border-radius: 24px;
            box-shadow: 
                0 20px 60px rgba(0,0,0,0.25),
                0 0 0 6px rgba(255,255,255,0.1);
            transition: all 0.5s ease;
        }

        .hp-mockup img:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 70px rgba(0,0,0,0.3);
        }

        @media (max-width: 991px) {
            .hp-mockup img {
                width: 200px;
            }
        }

        /* ============ SECTION UMUM ============ */
        .section-padding {
            padding: 60px 0;
        }

        .section-title {
            font-size: 30px;
            font-weight: 700;
            color: #0a2a5e;
            margin-bottom: 12px;
        }

        .section-subtitle {
            color: #64748b;
            font-size: 17px;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.7;
        }

        .section-divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #1769d1, #3b8cff);
            border-radius: 4px;
            margin: 0 auto 20px;
        }

        /* ============ FEATURES ============ */
        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 30px 24px;
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
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #e8f1ff, #d4e4ff);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 28px;
            color: #1769d1;
        }

        .feature-card h5 {
            font-weight: 700;
            color: #0a2a5e;
            margin-bottom: 8px;
        }

        .feature-card p {
            color: #64748b;
            font-size: 14px;
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
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 15px;
        }

        .about-list li:last-child {
            border-bottom: none;
        }

        .about-list i {
            width: 36px;
            height: 36px;
            background: #e8f1ff;
            color: #1769d1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* ============ DOWNLOAD SECTION ============ */
        .download-section {
            background: linear-gradient(135deg, #f8faff, #edf3fa);
        }

        .download-card-main {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(0,0,0,0.03);
        }

        .qr-box {
            width: 200px;
            height: 200px;
            margin: 0 auto;
            padding: 12px;
            background: white;
            border: 2px dashed #dce3ed;
            border-radius: 18px;
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
            gap: 12px;
            padding: 14px 36px;
            background: linear-gradient(135deg, #1769d1, #0f3d91);
            color: white;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            font-size: 16px;
        }

        .download-btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(23, 105, 209, 0.3);
            color: white;
        }

        .download-btn-main i {
            font-size: 18px;
        }

        .version-tag {
            display: inline-block;
            background: #e8f1ff;
            color: #1769d1;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .warning-box-download {
            margin-top: 20px;
            padding: 14px 20px;
            background: #fff8e6;
            border: 1px solid #fde68a;
            border-radius: 12px;
            color: #92400e;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .warning-box-download i {
            font-size: 16px;
        }

        /* ============ FOOTER ============ */
        .footer-custom {
            background: #0a1e3d;
            color: rgba(255,255,255,0.7);
            padding: 40px 0 20px;
        }

        .footer-custom h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .footer-custom a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-custom a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 767px) {
            .hero-title {
                font-size: 30px;
            }

            .hero-stats {
                gap: 20px;
                flex-wrap: wrap;
            }

            .hero-section {
                padding: 40px 0 30px;
            }

            .section-padding {
                padding: 40px 0;
            }

            .download-card-main {
                padding: 24px;
            }

            .qr-box {
                width: 170px;
                height: 170px;
            }

            .hp-mockup img {
                width: 180px;
            }

            .about-list li {
                font-size: 14px;
                padding: 10px 0;
            }

            .hero-logo {
                width: 120px !important;
                margin-top: 20px;
            }
        }

        /* Logo hero */
        .hero-logo {
            width: 180px;
            filter: drop-shadow(0 8px 30px rgba(0,0,0,0.3));
            transition: all 0.3s ease;
        }

        .hero-logo:hover {
            transform: scale(1.05);
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
                <div class="col-lg-5 text-center">
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

            <!-- ====== LAYOUT: HP DI KIRI, TEKS DI KANAN ====== -->
            <div class="row align-items-center g-5 mt-2">
                <!-- KIRI: HP SCREENSHOT -->
                <div class="col-lg-6 text-center hp-mockup">
                    <img src="{{ asset('images/APP_Sipera_Banner.png') }}" alt="Tampilan Aplikasi SIPERA Mobile">
                </div>

                <!-- KANAN: Penjelasan + List -->
                <div class="col-lg-6">
                    <h4 style="color:#0a2a5e; font-weight:700; margin-bottom:8px;">
                        <i class="fas fa-circle-check" style="color:#1769d1; margin-right:10px;"></i>
                        Mengapa SIPERA Mobile?
                    </h4>
                    <p style="color:#475569; line-height:1.7; margin-bottom:20px;">
                        SIPERA Mobile hadir sebagai jembatan antara masyarakat dan Polres Malang.
                        Dengan aplikasi ini, pengaduan dapat disampaikan kapan saja dan di mana saja,
                        serta dipantau secara real-time.
                    </p>

                    <ul class="about-list">
                        <li><i class="fas fa-clock"></i> Pengaduan cepat dan responsif</li>
                        <li><i class="fas fa-map-pin"></i> Integrasi lokasi untuk akurasi</li>
                        <li><i class="fas fa-history"></i> Riwayat pengaduan lengkap</li>
                        <li><i class="fas fa-bell"></i> Pantau status terbaru</li>
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

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-pen-to-square"></i></div>
                        <h5>Pengajuan Pengaduan</h5>
                        <p>Kirimkan laporan atau pengaduan Anda dengan mudah melalui formulir yang tersedia.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-chart-simple"></i></div>
                        <h5>Pemantauan Status</h5>
                        <p>Pantau perkembangan pengaduan Anda secara real-time dari mana saja.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-list-check"></i></div>
                        <h5>Riwayat Pengaduan</h5>
                        <p>Akses riwayat lengkap semua pengaduan yang pernah Anda ajukan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-circle-info"></i></div>
                        <h5>Informasi Layanan</h5>
                        <p>Dapatkan informasi terkini tentang layanan kepolisian Polres Malang.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="fas fa-location-dot"></i></div>
                        <h5>Integrasi Lokasi</h5>
                        <p>Pengaduan dilengkapi dengan lokasi untuk respons yang lebih tepat sasaran.</p>
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
                <div class="row align-items-center g-5">
                    <!-- Left: Info -->
                    <div class="col-lg-7">
                        <h4 style="font-weight:700; color:#0a2a5e;">
                            <i class="fas fa-download me-2" style="color:#1769d1;"></i>
                            Download Aplikasi
                        </h4>
                        <p style="color:#475569; line-height:1.7;">
                            SIPERA Mobile tersedia untuk perangkat Android. Pastikan perangkat Anda
                            mendukung untuk pengalaman terbaik.
                        </p>

                        <ul class="about-list" style="margin-top:10px;">
                            <li><i class="fas fa-robot"></i> Android 5.0 (Lollipop) ke atas</li>
                            <li><i class="fas fa-database"></i> Ukuran aplikasi: ±25 MB</li>
                            <li><i class="fas fa-globe"></i> Bahasa: Indonesia</li>
                        </ul>

                        <div style="margin-top:25px;">
                            <!-- DOWNLOAD BUTTON -->
                            <a href="https://drive.google.com/file/d/1qLSWkPnlvnfh8PuUiev5BVTszJ4_4hXM/view?usp=sharing"
                               class="download-btn-main"
                               target="_blank">
                                <i class="fas fa-cloud-arrow-down"></i>
                                Download SIPERA Mobile
                            </a>

                            <div style="margin-top:12px;">
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
                        <div style="font-weight:600; color:#0a2a5e; font-size:16px; margin-bottom:8px;">
                            <i class="fas fa-qrcode me-2" style="color:#1769d1;"></i>
                            Scan untuk Mengunduh
                        </div>
                        <p style="font-size:13px; color:#64748b; margin-bottom:16px;">
                            Gunakan kamera atau aplikasi QR Scanner pada perangkat Android Anda.
                        </p>

                        <div class="qr-box">
                            <img src="{{ asset('images/qr-sipera2.png') }}" alt="QR Code Download SIPERA Mobile">
                        </div>

                        <p style="font-size:12px; color:#94a3b8; margin-top:14px;">
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
            <div class="row g-4">
                <div class="col-lg-4">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:14px;">
                        <img src="{{ asset('images/Logo_Polres_Malang.png') }}" alt="Logo" style="height:44px; filter: brightness(0) invert(1);">
                        <span style="font-weight:700; font-size:20px;">SIPERA Mobile</span>
                    </div>
                    <p style="font-size:14px; line-height:1.7; max-width:300px;">
                        Sistem Pelaporan Masyarakat Polres Malang — mempermudah akses layanan kepolisian.
                    </p>
                </div>

                <div class="col-lg-4">
                    <h5>Menu</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:2.2;">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                        <li><a href="#fitur">Fitur</a></li>
                        <li><a href="#unduh">Unduh</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h5>Kontak</h5>
                    <ul style="list-style:none; padding:0; margin:0; line-height:2.2;">
                        <li><i class="fas fa-map-pin me-2" style="width:18px;"></i> Polres Malang, Jawa Timur</li>
                        <li><i class="fas fa-phone me-2" style="width:18px;"></i> (0341) 123456</li>
                        <li><i class="fas fa-envelope me-2" style="width:18px;"></i> sipera@polresmalang.go.id</li>
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