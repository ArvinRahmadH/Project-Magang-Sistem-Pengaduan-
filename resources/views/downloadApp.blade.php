<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Download SIPERA Mobile</title>

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
            background: linear-gradient(135deg, #f4f7fb 0%, #e9eef5 100%);
            color: #1f2937;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .download-card {
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.12);
            overflow: hidden;
        }

        /* Header */
        .card-header-custom {
            background: linear-gradient(135deg, #0f3d91, #1769d1);
            color: white;
            padding: 35px 30px;
            text-align: center;
        }

        .logo {
            width: 90px;
            height: 90px;
            object-fit: contain;
            margin-bottom: 15px;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.2));
        }

        .app-title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .app-subtitle {
            font-size: 15px;
            opacity: 0.9;
            margin: 0;
        }

        /* Content */
        .card-content {
            padding: 45px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a5f;
            margin-bottom: 12px;
        }

        .description {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 13px;
            color: #475569;
        }

        .feature-list i {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f1ff;
            color: #1769d1;
            border-radius: 50%;
            font-size: 13px;
        }

        /* QR */
        .qr-section {
            text-align: center;
            padding: 10px;
        }

        .qr-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e3a5f;
            margin-bottom: 8px;
        }

        .qr-description {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .qr-container {
            width: 230px;
            height: 230px;
            margin: 0 auto 20px;
            padding: 15px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-code {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .scan-info {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 20px;
        }

        /* Download Button */
        .download-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            max-width: 300px;
            padding: 13px 22px;
            background: #1769d1;
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .download-btn:hover {
            background: #0f3d91;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(23, 105, 209, 0.25);
        }

        /* Version */
        .version-info {
            margin-top: 18px;
            font-size: 13px;
            color: #94a3b8;
        }

        /* Warning */
        .warning-box {
            margin-top: 35px;
            padding: 15px 18px;
            border-radius: 12px;
            background: #fff8e6;
            border: 1px solid #fde68a;
            color: #92400e;
            font-size: 13px;
            line-height: 1.6;
        }

        .warning-box i {
            margin-right: 6px;
        }

        /* Footer */
        .card-footer-custom {
            padding: 18px 30px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 767px) {

            .card-content {
                padding: 30px 22px;
            }

            .app-title {
                font-size: 25px;
            }

            .section-title {
                font-size: 21px;
            }

            .qr-container {
                width: 210px;
                height: 210px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <div class="download-card">

            <!-- ================= HEADER ================= -->
            <div class="card-header-custom">

                <!-- Logo Polres Malang -->
                <img
                    src="{{ asset('images/Logo_Polres_Malang.png') }}"
                    alt="Logo Polres Malang"
                    class="logo"
                >

                <div class="app-title">
                    SIPERA Mobile
                </div>

                <p class="app-subtitle">
                    Sistem Pelaporan Polres Malang
                </p>

            </div>


            <!-- ================= CONTENT ================= -->
            <div class="card-content">

                <div class="row align-items-center g-5">

                    <!-- LEFT -->
                    <div class="col-lg-7">

                        <h2 class="section-title">
                            Download Aplikasi SIPERA Mobile
                        </h2>

                        <p class="description">
                            SIPERA Mobile merupakan aplikasi pendukung Sistem
                            Pelaporan Polres Malang yang digunakan untuk
                            mempermudah masyarakat dalam menyampaikan pengaduan
                            serta memantau informasi terkait laporan.
                        </p>


                        <!-- Features -->
                        <ul class="feature-list">

                            <li>
                                <i class="fas fa-check"></i>
                                <span>
                                    Pengajuan pengaduan masyarakat
                                </span>
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                <span>
                                    Pemantauan status pengaduan
                                </span>
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                <span>
                                    Riwayat pengaduan
                                </span>
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                <span>
                                    Informasi layanan kepolisian
                                </span>
                            </li>

                            <li>
                                <i class="fas fa-check"></i>
                                <span>
                                    Integrasi lokasi pengaduan
                                </span>
                            </li>

                        </ul>


                        <!-- Warning -->
                        <div class="warning-box">

                            <i class="fas fa-triangle-exclamation"></i>

                            Aplikasi ini masih dalam tahap pengembangan
                            dan digunakan untuk keperluan pengujian.

                        </div>

                    </div>


                    <!-- RIGHT / QR -->
                    <div class="col-lg-5">

                        <div class="qr-section">

                            <div class="qr-title">
                                Scan untuk Mengunduh
                            </div>

                            <p class="qr-description">
                                Gunakan kamera atau aplikasi QR Scanner
                                pada perangkat Android Anda.
                            </p>


                            <!-- ========================= -->
                            <!-- TEMPAT QR CODE -->
                            <!-- ========================= -->

                            <div class="qr-container">

                                <img
                                    src="{{ asset('images/qr-sipera2.png') }}"
                                    alt="QR Code Download SIPERA Mobile"
                                    class="qr-code"
                                >

                            </div>


                            <div class="scan-info">
                                <i class="fas fa-qrcode"></i>
                                Scan QR Code untuk membuka halaman download
                            </div>


                            <!-- Download Button -->
                            <!-- GANTI LINK INI DENGAN LINK GOOGLE DRIVE -->
                            <a
                                href="https://drive.google.com/file/d/1qLSWkPnlvnfh8PuUiev5BVTszJ4_4hXM/view?usp=sharing"
                                class="download-btn"
                                target="_blank"
                            >
                                <i class="fas fa-download"></i>
                                Download SIPERA Mobile
                            </a>


                            <div class="version-info">
                                Versi 1.0.0 • Android
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ================= FOOTER ================= -->
            <div class="card-footer-custom">

                &copy; 2026 Polres Malang -
                Sistem Pelaporan Masyarakat

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>