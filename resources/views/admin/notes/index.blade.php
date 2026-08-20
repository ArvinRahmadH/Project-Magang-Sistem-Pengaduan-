<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --card-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 12px 40px rgba(67, 97, 238, 0.15);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding-bottom: 2rem;
        }
        
        .container {
            max-width: 1200px;
        }
        
        .header-card {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }
        
        .main-card {
            border-radius: 12px;
            border: none;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .main-card:hover {
            box-shadow: var(--hover-shadow);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            padding: 1.25rem 1.5rem;
        }
        
        .card-header strong {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .btn-primary-custom {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        .btn-secondary-custom {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-secondary-custom:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-warning-custom {
            background-color: #ffc107;
            color: #212529;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-warning-custom:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
            color: #212529;
        }
        
        .table-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            color: #495057;
            padding: 1rem;
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f3f4;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.03);
            transform: translateX(4px);
        }
        
        .news-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e9ecef;
            transition: transform 0.3s ease;
        }
        
        .news-image:hover {
            transform: scale(1.8);
            z-index: 10;
            position: relative;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .link-badge {
            display: inline-block;
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--primary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(76, 201, 240, 0.3);
        }
        
        .link-badge:hover {
            background-color: rgba(76, 201, 240, 0.2);
            transform: translateY(-2px);
            color: var(--secondary-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .empty-state h4 {
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .empty-state p {
            color: #adb5bd;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .news-title {
            font-weight: 500;
            color: #343a40;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                margin-bottom: 1.5rem;
                border: 1px solid #e9ecef;
                border-radius: 8px;
                padding: 1rem;
            }
            
            .table tbody td {
                display: block;
                text-align: right;
                padding: 0.75rem;
                border: none;
                position: relative;
            }
            
            .table tbody td:before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                font-weight: 600;
                color: #495057;
            }
            
            .table tbody tr:hover {
                transform: none;
            }
            
            .news-image {
                width: 100%;
                height: auto;
                max-height: 200px;
                margin-bottom: 0.5rem;
            }
            
            .news-title {
                max-width: 100%;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    {{-- HEADER ACTION --}}
    <div class="header-card d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="mb-3 mb-md-0">
            <h1 class="h3 mb-1">Kelola Berita</h1>
            <p class="mb-0 opacity-75">Perbarui dan edit berita yang tersedia</p>
        </div>
        <a href="{{ url('/admin/notes') }}" class="btn btn-light d-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="main-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Daftar Berita</strong>
            <span class="badge bg-primary rounded-pill">{{ $news->count() }} Berita</span>
        </div>

        <div class="card-body p-0">
            @if($news->count() == 0)
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <h4>Belum ada berita</h4>
                    <p>Tambahkan berita pertama Anda untuk ditampilkan di sini</p>
                </div>
            @else
                <div class="table-container">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th data-label="Judul">Judul</th>
                                <th data-label="Gambar">Gambar</th>
                                <th data-label="Link">Link</th>
                                <th data-label="Aksi" width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                            <tr>
                                <td data-label="Judul">
                                    <div class="news-title">{{ $item->title }}</div>
                                </td>
                                <td data-label="Gambar">
                                    <img src="{{ asset('storage/'.$item->image_path) }}" 
                                         class="news-image" 
                                         alt="{{ $item->title }}">
                                </td>
                                <td data-label="Link">
                                    <a href="{{ $item->link }}" target="_blank" class="link-badge d-inline-flex align-items-center">
                                        <i class="bi bi-link-45deg me-1"></i> Lihat Berita
                                    </a>
                                </td>
                                <td data-label="Aksi">
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                       class="btn btn-warning-custom d-inline-flex align-items-center">
                                       <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        
        @if($news->count() > 0)
        <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center">
            <small class="text-muted">Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}</small>
            <small class="text-muted">Klik gambar untuk memperbesar</small>
        </div>
        @endif
    </div>
</div>

<script>
    // Menambahkan label untuk responsif table
    document.addEventListener('DOMContentLoaded', function() {
        const thElements = document.querySelectorAll('thead th');
        const tdElements = document.querySelectorAll('tbody td');
        
        thElements.forEach((th, index) => {
            const label = th.textContent.trim();
            const tds = document.querySelectorAll(`tbody td:nth-child(${index + 1})`);
            
            tds.forEach(td => {
                td.setAttribute('data-label', label);
            });
        });
        
        // Efek hover pada gambar
        const images = document.querySelectorAll('.news-image');
        images.forEach(img => {
            img.addEventListener('mouseenter', function() {
                // Tambahkan z-index agar gambar yang diperbesar tidak terpotong
                this.style.zIndex = '100';
            });
            
            img.addEventListener('mouseleave', function() {
                // Kembalikan z-index setelah mouse leave
                setTimeout(() => {
                    this.style.zIndex = '';
                }, 300);
            });
        });
    });
</script>

</body>
</html>