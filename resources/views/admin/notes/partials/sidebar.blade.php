

<div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="bi bi-shield-check"></i> <span>Admin Panel</span></h2>
    </div>
    
    <div class="sidebar-nav">
        <a href="#" id="dashboard-tab" class="active">
            <i class="bi bi-journal-text"></i>
            <span>Data Pengaduan User</span>
        </a>
        <a href="#" id="table-tab">
            <i class="bi bi-people"></i>
            <span>Tabel Pengaduan</span>
        </a>
        <a href="#" id="#">
            <i class="bi bi-people"></i>
            <span>Riwayat Laporan Selesai</span>
        </a>
        <a href="{{ route('admin.news.create') }}">
            <i class="bi bi-newspaper"></i>
            <span>Tambah Berita</span>
        </a>
        <a href="{{ route('admin.news.index') }}">
            <i class="bi bi-pencil-square"></i>
            <span>Update Berita</span>
        </a>
        <a href="#">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
        </a>
    </div>
</div>