@php
    $totalNotes = count($notes);
    // Urutkan notes berdasarkan status
    $sortedNotes = $notes->sortBy(function($note) {
        $order = ['menunggu' => 1, 'diproses' => 2, 'selesai' => 3];
        return $order[$note->status] ?? 4;
    });
    
    // Hitung jumlah per status untuk keperluan filter
    $statusCounts = [
        'semua' => $totalNotes,
        'menunggu' => $notes->where('status', 'menunggu')->count(),
        'diproses' => $notes->where('status', 'diproses')->count(),
        'selesai' => $notes->where('status', 'selesai')->count()
    ];
    
    // Ambil parameter filter dari request (jika ada)
    $activeFilter = request('status_filter', 'semua');
@endphp

@if($totalNotes == 0)
<!-- Empty State for Table -->
<div class="empty-state">
    <i class="bi bi-table"></i>
    <h4>Belum Ada Data Tabel Pengaduan</h4>
    <p>Tidak ada data pengaduan yang tersedia untuk ditampilkan dalam tabel.</p>
</div>
@else
<!-- Filter Status Section -->
<div class="status-filter mb-4">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <span class="me-2 text-muted">Filter Status:</span>
        <a href="{{ request()->fullUrlWithQuery(['status_filter' => 'semua']) }}" 
           class="filter-btn {{ $activeFilter == 'semua' ? 'active' : '' }}">
            Semua
            <span class="badge bg-secondary ms-1">{{ $statusCounts['semua'] }}</span>
        </a>
        <a href="{{ request()->fullUrlWithQuery(['status_filter' => 'menunggu']) }}" 
           class="filter-btn {{ $activeFilter == 'menunggu' ? 'active' : '' }}">
            Menunggu
            <span class="badge bg-warning ms-1">{{ $statusCounts['menunggu'] }}</span>
        </a>
        <a href="{{ $activeFilter == 'diproses' ? url()->current() : request()->fullUrlWithQuery(['status_filter' => 'diproses']) }}" 
           class="filter-btn {{ $activeFilter == 'diproses' ? 'active' : '' }}">
            Diproses
            <span class="badge bg-info ms-1">{{ $statusCounts['diproses'] }}</span>
        </a>
        <a href="{{ $activeFilter == 'selesai' ? url()->current() : request()->fullUrlWithQuery(['status_filter' => 'selesai']) }}" 
           class="filter-btn {{ $activeFilter == 'selesai' ? 'active' : '' }}">
            Selesai
            <span class="badge bg-success ms-1">{{ $statusCounts['selesai'] }}</span>
        </a>
    </div>
</div>

<!-- Table Card -->
<div class="table-container">
    <table class="table align-middle table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sortedNotes as $note)
                @php
                    // Filter data berdasarkan status yang aktif
                    $showNote = true;
                    if ($activeFilter != 'semua' && $note->status != $activeFilter) {
                        $showNote = false;
                    }
                @endphp
                
                @if($showNote)
                    @include('admin.notes.partials.table-row', ['note' => $note])
                @endif
            @endforeach
            
            @if(!$sortedNotes->where('status', $activeFilter)->count() && $activeFilter != 'semua')
                <tr>
                    <td colspan="10" class="text-center py-4">
                        <div class="empty-state-sm">
                            <i class="bi bi-inbox"></i>
                            <p>Tidak ada data dengan status "{{ $activeFilter }}"</p>
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endif

<style>
.status-filter {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.filter-btn {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    background: white;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    color: #495057;
    text-decoration: none;
    transition: all 0.2s;
}

.filter-btn:hover {
    background: #f8f9fa;
    border-color: #adb5bd;
    color: #212529;
}

.filter-btn.active {
    background: #396EBD;
    border-color: #396EBD;
    color: white;
}

.filter-btn.active .badge {
    background: rgba(255,255,255,0.3) !important;
    color: white !important;
}

.empty-state-sm {
    text-align: center;
    color: #6c757d;
}

.empty-state-sm i {
    font-size: 2rem;
    margin-bottom: 10px;
    display: block;
}
</style>