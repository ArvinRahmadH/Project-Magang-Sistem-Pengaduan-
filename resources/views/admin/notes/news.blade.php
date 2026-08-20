<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --primary-hover: #3a56d4;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --light-bg: #f8fafc;
            --card-shadow: 0 20px 40px rgba(67, 97, 238, 0.08);
            --input-focus-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            --gradient-primary: linear-gradient(135deg, #4361ee 0%, #3a56d4 100%);
            --gradient-bg: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            --border-radius: 12px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--gradient-bg);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            min-height: 100vh;
            color: #334155;
            line-height: 1.6;
            padding-top: 30px;
            padding-bottom: 60px;
        }
        
        .container {
            max-width: 900px;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 0 10px;
        }
        
        .back-btn {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 10px;
            font-weight: 500;
            padding: 10px 24px;
            background: white;
            color: var(--primary-color);
            border: 2px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
        
        .back-btn:hover {
            transform: translateX(-4px);
            background: var(--primary-light);
            border-color: var(--primary-color);
            box-shadow: 0 4px 16px rgba(67, 97, 238, 0.12);
        }
        
        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            background: linear-gradient(90deg, #4361ee, #3a56d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin: 0;
            padding: 0 20px;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            background: white;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                        box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: visible;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(67, 97, 238, 0.15);
        }
        
        .card-header {
            background: transparent;
            color: #1e293b;
            border-bottom: 1px solid #f1f5f9;
            padding: 28px 32px;
        }
        
        .card-header h5 {
            font-weight: 700;
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 0;
        }
        
        .card-header-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 24px;
            flex-shrink: 0;
        }
        
        .card-body {
            padding: 32px;
        }
        
        .form-section {
            background: #f8fafc;
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 28px;
            border: 1px solid #f1f5f9;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            background: #f8fafc;
            border-color: #e2e8f0;
        }
        
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 16px;
            border-bottom: 2px solid #eef2ff;
        }
        
        .form-section-title i {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 18px;
            flex-shrink: 0;
        }
        
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }
        
        .form-label i {
            color: var(--primary-color);
            width: 20px;
            text-align: center;
        }
        
        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            color: #334155;
        }
        
        .form-control::placeholder {
            color: #94a3b8;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: var(--input-focus-shadow);
            background: white;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            pointer-events: none;
        }
        
        .input-with-icon .form-control {
            padding-left: 52px;
        }
        
        .form-text {
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 8px;
            padding-left: 30px;
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 12px;
            padding: 18px 40px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            margin-top: 20px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(67, 97, 238, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(-1px);
        }
        
        .file-upload-area {
            border: 3px dashed #e2e8f0;
            border-radius: 16px;
            padding: 60px 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .file-upload-area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }
        
        .file-upload-area:hover, .file-upload-area.dragover {
            border-color: var(--primary-color);
            background: var(--primary-light);
            transform: translateY(-3px);
        }
        
        .file-upload-area.dragover::before {
            opacity: 0.03;
        }
        
        .file-upload-area > * {
            position: relative;
            z-index: 1;
        }
        
        .file-upload-icon {
            font-size: 56px;
            color: var(--primary-color);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        
        .file-upload-area:hover .file-upload-icon {
            transform: scale(1.1);
        }
        
        .file-upload-text {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        
        .file-upload-subtext {
            color: #64748b;
            font-size: 0.9rem;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .file-input {
            display: none;
        }
        
        .file-name {
            margin-top: 20px;
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: var(--primary-light);
            padding: 12px 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 20px auto 0;
            transition: all 0.3s ease;
        }
        
        .file-name:hover {
            background: #e0e7ff;
        }
        
        .preview-container {
            margin-top: 25px;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }
        
        .preview-image {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border: 3px solid white;
            display: none;
            max-height: 300px;
            object-fit: cover;
            margin: 0 auto;
        }
        
        .preview-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 12px;
            display: block;
            text-align: left;
            font-size: 0.95rem;
        }
        
        /* Toast Notifikasi */
        .toast-container {
            z-index: 1055;
        }
        
        .toast-success {
            background: var(--success-color);
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        }
        
        .toast-success .toast-header {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px 20px;
        }
        
        .toast-success .toast-body {
            background: var(--success-color);
            color: white;
            padding: 16px 20px;
        }
        
        /* Progress Bar */
        .upload-progress {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            margin-top: 15px;
            overflow: hidden;
            display: none;
        }
        
        .upload-progress-bar {
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 3px;
            width: 0%;
            transition: width 0.3s ease;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .header-nav {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .back-btn {
                align-self: flex-start;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .card-header {
                padding: 24px 20px;
            }
            
            .card-header h5 {
                font-size: 1.4rem;
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }
            
            .card-body {
                padding: 24px 20px;
            }
            
            .form-section {
                padding: 24px 20px;
            }
            
            .file-upload-area {
                padding: 40px 20px;
            }
            
            .btn-primary {
                padding: 16px 30px;
            }
        }
        
        /* Animasi placeholder */
        @keyframes placeholderShift {
            0% { opacity: 0.5; transform: translateY(2px); }
            50% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0.5; transform: translateY(2px); }
        }
        
        .animated-placeholder::placeholder {
            animation: placeholderShift 4s ease-in-out infinite;
        }
        
        /* Floating label effect */
        .floating-label-group {
            position: relative;
            margin-bottom: 24px;
        }
        
        .floating-label {
            position: absolute;
            left: 18px;
            top: 18px;
            color: #94a3b8;
            font-size: 1rem;
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 8px;
        }
        
        .form-control:focus + .floating-label,
        .form-control:not(:placeholder-shown) + .floating-label {
            top: -10px;
            font-size: 0.85rem;
            color: var(--primary-color);
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container py-4">

    {{-- Header dengan judul dan tombol kembali --}}
    <div class="header-nav">
        <a href="{{ url('/admin/notes') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="page-title">Tambah Berita Baru</h1>
        <div style="width: 100px;"></div> {{-- Spacer untuk alignment --}}
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <div class="card-header-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <span>Form Input Berita</span>
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" id="newsForm">
                @csrf
                
                {{-- Section Informasi Berita --}}
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="bi bi-info-circle"></i> Informasi Berita
                    </div>
                    
                    <div class="floating-label-group mb-4">
                        <div class="input-with-icon">
                            <i class="bi bi-type-h1 input-icon"></i>
                            <input type="text" name="title" class="form-control animated-placeholder" 
                                   placeholder="Masukkan judul berita" required>
                        </div>
                        <div class="form-text">
                            <i class="bi bi-lightbulb"></i> Judul yang menarik akan meningkatkan minat pembaca
                        </div>
                    </div>
                    
                    <div class="floating-label-group mb-4">
                        <div class="input-with-icon">
                            <i class="bi bi-link-45deg input-icon"></i>
                            <input type="url" name="link" class="form-control" 
                                   placeholder="https://contoh.com/berita-terkini" required>
                        </div>
                        <div class="form-text">
                            <i class="bi bi-shield-check"></i> Pastikan link berita valid dan dapat diakses
                        </div>
                    </div>
                </div>
                
                {{-- Section Upload Gambar --}}
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="bi bi-image"></i> Gambar Berita
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-upload"></i> Unggah Gambar
                        </label>
                        
                        <div class="file-upload-area" id="fileUploadArea">
                            <div class="file-upload-icon">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </div>
                            <div class="file-upload-text">Drag & Drop atau Klik untuk Unggah</div>
                            <div class="file-upload-subtext">Format: JPG, PNG, GIF (Maksimal 5MB)</div>
                            <input type="file" name="image" class="form-control file-input" id="imageInput" accept="image/*" required>
                            
                            <div class="file-name" id="fileName">
                                <i class="bi bi-file-image"></i> <span id="fileText">Belum ada file yang dipilih</span>
                            </div>
                            
                            <div class="upload-progress" id="uploadProgress">
                                <div class="upload-progress-bar" id="uploadProgressBar"></div>
                            </div>
                        </div>
                        
                        <div class="preview-container">
                            <span class="preview-label">
                                <i class="bi bi-eye"></i> Preview Gambar
                            </span>
                            <img class="preview-image" id="imagePreview" alt="Preview Gambar">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cloud-check-fill"></i> SIMPAN BERITA
                </button>
            </form>
        </div>
    </div>
    
    {{-- Notifikasi Sukses --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-4">
        <div id="successToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong class="me-auto">Berhasil!</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="bi bi-check-lg me-2"></i> Berita berhasil disimpan!
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elemen DOM
        const fileUploadArea = document.getElementById('fileUploadArea');
        const imageInput = document.getElementById('imageInput');
        const fileText = document.getElementById('fileText');
        const imagePreview = document.getElementById('imagePreview');
        const newsForm = document.getElementById('newsForm');
        const successToast = new bootstrap.Toast(document.getElementById('successToast'));
        const uploadProgress = document.getElementById('uploadProgress');
        const uploadProgressBar = document.getElementById('uploadProgressBar');
        
        // Drag & Drop untuk upload gambar
        fileUploadArea.addEventListener('click', function() {
            imageInput.click();
        });
        
        fileUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileUploadArea.classList.add('dragover');
        });
        
        fileUploadArea.addEventListener('dragleave', function() {
            fileUploadArea.classList.remove('dragover');
        });
        
        fileUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            fileUploadArea.classList.remove('dragover');
            
            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;
                updateFileInfo();
            }
        });
        
        // Update informasi file saat dipilih
        imageInput.addEventListener('change', updateFileInfo);
        
        function updateFileInfo() {
            if (imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                
                // Update nama file
                fileText.textContent = `${file.name} (${fileSize} MB)`;
                
                // Simulasi progress upload
                simulateUploadProgress();
                
                // Tampilkan preview gambar
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                fileText.textContent = 'Belum ada file yang dipilih';
                imagePreview.style.display = 'none';
                uploadProgress.style.display = 'none';
            }
        }
        
        function simulateUploadProgress() {
            uploadProgress.style.display = 'block';
            uploadProgressBar.style.width = '0%';
            
            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.random() * 20;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(interval);
                    
                    // Hide progress bar after completion
                    setTimeout(() => {
                        uploadProgress.style.display = 'none';
                    }, 1000);
                }
                uploadProgressBar.style.width = progress + '%';
            }, 200);
        }
        
        // Validasi form sebelum submit
        newsForm.addEventListener('submit', function(e) {
            // Validasi sederhana
            const titleInput = document.querySelector('input[name="title"]');
            const linkInput = document.querySelector('input[name="link"]');
            
            if (!titleInput.value.trim()) {
                e.preventDefault();
                titleInput.focus();
                titleInput.style.borderColor = '#ef4444';
                return;
            }
            
            if (!linkInput.value.trim() || !isValidUrl(linkInput.value)) {
                e.preventDefault();
                linkInput.focus();
                linkInput.style.borderColor = '#ef4444';
                return;
            }
            
            // Di sini kita hanya menampilkan toast notifikasi
            // Form akan tetap submit seperti biasa
            e.preventDefault();
            
            // Tampilkan toast sukses
            successToast.show();
            
            // Submit form setelah 1.5 detik
            setTimeout(() => {
                newsForm.submit();
            }, 1500);
        });
        
        // Helper function untuk validasi URL
        function isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (_) {
                return false;
            }
        }
        
        // Efek placeholder dinamis untuk judul
        const titleInput = document.querySelector('input[name="title"]');
        const titlePlaceholders = [
            "Teknologi AI Terbaru di Tahun 2024",
            "Perkembangan Ekonomi Global Triwulan Ini",
            "Inovasi Startup Lokal yang Menginspirasi",
            "Berita Terkini Seputar Teknologi"
        ];
        
        let placeholderIndex = 0;
        setInterval(() => {
            titleInput.placeholder = titlePlaceholders[placeholderIndex];
            placeholderIndex = (placeholderIndex + 1) % titlePlaceholders.length;
        }, 3000);
        
        // Reset border color on input
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#e2e8f0';
            });
        });
        
        // Add floating label effect
        const floatingInputs = document.querySelectorAll('.form-control');
        floatingInputs.forEach(input => {
            const wrapper = document.createElement('div');
            wrapper.className = 'floating-label-group';
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);
            
            const label = document.createElement('label');
            label.className = 'floating-label';
            
            if (input.name === 'title') {
                label.textContent = 'Judul Berita';
            } else if (input.name === 'link') {
                label.textContent = 'Link Berita';
            }
            
            wrapper.appendChild(label);
        });
    });
</script>

</body>
</html>