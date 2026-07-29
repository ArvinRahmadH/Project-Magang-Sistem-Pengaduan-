<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Edit Berita</span>

            {{-- Tombol kembali --}}
            <a href="{{ url('/admin/news') }}" class="btn btn-sm btn-secondary">
                ← Kembali ke Halaman Daftar Berita
            </a>
        </div>

        <div class="card-body">

    {{-- FORM UPDATE --}}
    <form action="{{ route('admin.news.update', $news->id) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" value="{{ $news->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" name="link" value="{{ $news->link }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">
            Update Berita
        </button>
    </form>

    <hr>

    {{-- FORM DELETE (TERPISAH) --}}
    <form action="{{ route('admin.news.destroy', $news->id) }}" 
          method="POST"
          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">
            Hapus Berita
        </button>
    </form>

</div>

    </div>

</div>

</body>
</html>
