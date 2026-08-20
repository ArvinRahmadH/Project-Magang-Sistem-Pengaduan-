@php
    $notes = $notes ?? collect(); 
    $totalNotes = $notes->count();
    $menungguCount = $notes->where('status', 'menunggu')->count();
    $diprosesCount = $notes->where('status', 'diproses')->count();
    $selesaiCount  = $notes->where('status', 'selesai')->count();

    $total = $totalNotes > 0 ? $totalNotes : 1;

    $menungguPercent = $totalNotes > 0 ? ($menungguCount / $total) * 100 : 0;
    $diprosesPercent = $totalNotes > 0 ? ($diprosesCount / $total) * 100 : 0;
    $selesaiPercent  = $totalNotes > 0 ? ($selesaiCount / $total) * 100 : 0;
    
    // Data untuk grafik status
    $statusChartData = [
        'labels' => ['Menunggu', 'Diproses', 'Selesai'],
        'data' => [$menungguCount, $diprosesCount, $selesaiCount],
        'colors' => ['#ffc107', '#0dcaf0', '#198754']
    ];
    
    // Data untuk grafik kategori
    $categories = $notes->groupBy('kategori');
    $categoryLabels = [];
    $categoryData = [];
    $categoryColors = ['#4361ee', '#7209b7', '#f72585', '#4cc9f0', '#3a0ca3', '#ff9e00', '#06d6a0'];
    
    foreach($categories as $kategori => $items) {
        $categoryLabels[] = ucfirst($kategori);
        $categoryData[] = count($items);
    }
    
    // Data untuk pengaduan terbaru
    $recentNotes = $notes->sortByDesc('created_at')->take(5);
@endphp

<style>
    .stats-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, #f8fafd 0%, #e6eeff 100%);
        border-radius: 16px;
        border: 2px dashed #cbd5e0;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .empty-state i {
        font-size: 60px;
        color: #a0aec0;
        margin-bottom: 15px;
    }
    
    .empty-state h4 {
        font-size: 20px;
        color: #2d3748;
        margin-bottom: 10px;
        font-weight: 600;
    }
    
    .empty-state p {
        color: #718096;
        max-width: 400px;
        margin: 0 auto 20px;
        font-size: 15px;
    }
    
    /* Stat Cards */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.08);
        border: 1px solid #e2e8f0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(67, 97, 238, 0.12);
    }
    
    .stat-card h3 {
        font-size: 16px;
        color: #4a5568;
        margin-bottom: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .stat-card h3 i {
        font-size: 18px;
    }
    
    .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: #2d3748;
        line-height: 1;
        margin-bottom: 8px;
    }
    
    .stat-label {
        font-size: 13px;
        color: #718096;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Chart Cards */
    .chart-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.08);
        border: 1px solid #e2e8f0;
        margin-bottom: 20px;
        height: 100%;
    }
    
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .chart-header h3 {
        font-size: 18px;
        color: #2d3748;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .chart-header h3 i {
        font-size: 18px;
    }
    
    .chart-container {
        position: relative;
        height: 250px;
        width: 100%;
    }
    
    .chart-container-small {
        height: 200px;
    }
    
    /* Progress Chart */
    .progress-chart {
        margin-top: 16px;
    }
    
    .progress-item {
        margin-bottom: 16px;
    }
    
    .progress-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 6px;
        align-items: center;
    }
    
    .progress-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        font-size: 14px;
    }
    
    .progress-label i {
        font-size: 14px;
    }
    
    .progress-value {
        font-weight: 600;
        color: #2d3748;
        font-size: 14px;
    }
    
    .progress-bar-custom {
        height: 10px;
        background-color: #edf2f7;
        border-radius: 5px;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        border-radius: 5px;
        transition: width 1s ease-in-out;
    }
    
    /* Category List */
    .category-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 15px;
    }
    
    .category-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 12px;
        background: #f8fafc;
        border-radius: 8px;
        border-left: 4px solid #4361ee;
        transition: all 0.2s ease;
    }
    
    .category-item:hover {
        background: #edf2f7;
        transform: translateX(3px);
    }
    
    .category-name {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        font-size: 14px;
        color: #2d3748;
    }
    
    .category-count {
        font-weight: 700;
        font-size: 16px;
        color: #2d3748;
        background: white;
        padding: 4px 10px;
        border-radius: 20px;
        min-width: 40px;
        text-align: center;
    }
    
    /* Category Chart */
    .category-chart-container {
        margin-top: 10px;
    }
    
    /* Recent Notes */
    .recent-notes-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .recent-note-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: #f8fafc;
        border-radius: 10px;
        transition: background-color 0.2s ease;
    }
    
    .recent-note-item:hover {
        background: #edf2f7;
    }
    
    .note-title {
        font-weight: 500;
        color: #2d3748;
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .note-time {
        font-size: 12px;
        color: #718096;
        background: white;
        padding: 4px 8px;
        border-radius: 16px;
        font-weight: 500;
        white-space: nowrap;
    }
    
    /* Legend */
    .chart-legend {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 16px;
        flex-wrap: wrap;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #4a5568;
    }
    
    .legend-color {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    
    /* Badge Status */
    .status-badge {
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 12px;
        font-weight: 600;
    }
    
    /* Category Colors */
    .cat-color-1 { border-left-color: #4361ee !important; }
    .cat-color-2 { border-left-color: #7209b7 !important; }
    .cat-color-3 { border-left-color: #f72585 !important; }
    .cat-color-4 { border-left-color: #4cc9f0 !important; }
    .cat-color-5 { border-left-color: #3a0ca3 !important; }
    .cat-color-6 { border-left-color: #ff9e00 !important; }
    .cat-color-7 { border-left-color: #06d6a0 !important; }
    
    /* Responsive */
    @media (max-width: 768px) {
        .stat-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .stat-value {
            font-size: 28px;
        }
        
        .chart-container {
            height: 220px;
        }
        
        .chart-container-small {
            height: 180px;
        }
    }
    
    @media (max-width: 576px) {
        .stat-grid {
            grid-template-columns: 1fr;
        }
        
        .chart-container {
            height: 200px;
        }
        
        .chart-container-small {
            height: 160px;
        }
    }
</style>

<div class="stats-container">
    @if($totalNotes == 0)
    <!-- Empty State -->
    <div class="empty-state">
        <i class="bi bi-journal-x"></i>
        <h4>Belum Ada Data Pengaduan</h4>
        <p>Belum ada data pengaduan yang tersedia. Mulai tambahkan data pengaduan untuk melihat statistik.</p>
        <button class="btn btn-primary mt-3">
            <i class="bi bi-plus-lg"></i> Tambah Pengaduan Pertama
        </button>
    </div>
    @else
    <!-- Summary Cards -->
    <div class="stat-grid">
        <div class="stat-card">
            <h3><i class="bi bi-journal-text text-primary"></i> Total Catatan</h3>
            <div class="stat-value">{{ $totalNotes }}</div>
            <div class="stat-label">Semua Pengaduan</div>
        </div>
        
        <div class="stat-card">
            <h3><i class="bi bi-clock text-warning"></i> Menunggu</h3>
            <div class="stat-value">{{ $menungguCount }}</div>
            <div class="stat-label">{{ number_format($menungguPercent, 1) }}% dari total</div>
        </div>
        
        <div class="stat-card">
            <h3><i class="bi bi-arrow-repeat text-info"></i> Diproses</h3>
            <div class="stat-value">{{ $diprosesCount }}</div>
            <div class="stat-label">{{ number_format($diprosesPercent, 1) }}% dari total</div>
        </div>
        
        <div class="stat-card">
            <h3><i class="bi bi-check-circle text-success"></i> Selesai</h3>
            <div class="stat-value">{{ $selesaiCount }}</div>
            <div class="stat-label">{{ number_format($selesaiPercent, 1) }}% dari total</div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row g-3">
        <!-- Status Chart -->
        <div class="col-lg-6">
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="bi bi-pie-chart"></i> Distribusi Status</h3>
                </div>
                
                <div class="chart-container">
                    <canvas id="statusChart"></canvas>
                </div>
                
                <div class="chart-legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #ffc107;"></div>
                        <span>Menunggu</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #0dcaf0;"></div>
                        <span>Diproses</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #198754;"></div>
                        <span>Selesai</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Category Chart -->
        <div class="col-lg-6">
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="bi bi-tags"></i> Distribusi Kategori</h3>
                </div>
                
                @if($categories->isEmpty())
                <div class="text-center py-4">
                    <i class="bi bi-tag text-muted" style="font-size: 40px;"></i>
                    <p class="text-muted mt-2 mb-0">Belum ada kategori</p>
                </div>
                @else
                <!-- Bar Chart untuk Kategori -->
                <div class="chart-container chart-container-small">
                    <canvas id="categoryChart"></canvas>
                </div>
                
                <!-- Daftar Kategori yang Rapi -->
                <div class="category-list">
                    @foreach($categories as $kategori => $items)
                    @php
                        $colorIndex = $loop->index % count($categoryColors);
                        $colorClass = 'cat-color-' . ($colorIndex + 1);
                    @endphp
                    <div class="category-item {{ $colorClass }}">
                        <div class="category-name">
                            <span>{{ ucfirst($kategori) }}</span>
                        </div>
                        <div class="category-count">{{ count($items) }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Progress Bars Section -->
    <div class="chart-card mt-3">
        <div class="chart-header">
            <h3><i class="bi bi-bar-chart"></i> Detail Persentase Status</h3>
        </div>
        
        <div class="progress-chart">
            <div class="progress-item">
                <div class="progress-info">
                    <div class="progress-label text-warning">
                        <i class="bi bi-clock"></i> Menunggu
                    </div>
                    <div class="progress-value">{{ $menungguCount }} ({{ number_format($menungguPercent, 1) }}%)</div>
                </div>
                <div class="progress-bar-custom">
                    <div class="progress-fill bg-warning" style="width: {{ $menungguPercent }}%;"></div>
                </div>
            </div>
            
            <div class="progress-item">
                <div class="progress-info">
                    <div class="progress-label text-info">
                        <i class="bi bi-arrow-repeat"></i> Diproses
                    </div>
                    <div class="progress-value">{{ $diprosesCount }} ({{ number_format($diprosesPercent, 1) }}%)</div>
                </div>
                <div class="progress-bar-custom">
                    <div class="progress-fill bg-info" style="width: {{ $diprosesPercent }}%;"></div>
                </div>
            </div>
            
            <div class="progress-item">
                <div class="progress-info">
                    <div class="progress-label text-success">
                        <i class="bi bi-check-circle"></i> Selesai
                    </div>
                    <div class="progress-value">{{ $selesaiCount }} ({{ number_format($selesaiPercent, 1) }}%)</div>
                </div>
                <div class="progress-bar-custom">
                    <div class="progress-fill bg-success" style="width: {{ $selesaiPercent }}%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Notes -->
    @if($notes->count() > 0)
    <div class="chart-card mt-3">
        <div class="chart-header">
            <h3><i class="bi bi-clock-history"></i> Pengaduan Terbaru</h3>
        </div>
        
        <div class="recent-notes-list">
            @foreach($recentNotes as $note)
            <div class="recent-note-item">
                <div class="note-title">
                    {{ $note->title }}
                    @if($note->status == 'menunggu')
                    <span class="status-badge bg-warning">Menunggu</span>
                    @elseif($note->status == 'diproses')
                    <span class="status-badge bg-info">Diproses</span>
                    @else
                    <span class="status-badge bg-success">Selesai</span>
                    @endif
                </div>
                <div class="note-time">{{ $note->created_at->diffForHumans() }}</div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @endif
</div>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    @if($totalNotes > 0)
    document.addEventListener('DOMContentLoaded', function() {
        // Status Pie Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        
        const statusChart = new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: @json($statusChartData['labels']),
                datasets: [{
                    data: @json($statusChartData['data']),
                    backgroundColor: @json($statusChartData['colors']),
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '65%',
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1500
                }
            }
        });
        
        @if($categories->isNotEmpty())
        // Category Bar Chart dengan label yang lebih baik
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        
        // Buat label yang lebih pendek untuk grafik
        const shortLabels = @json($categoryLabels).map(label => {
            if (label.length > 12) {
                return label.substring(0, 10) + '...';
            }
            return label;
        });
        
        const categoryChart = new Chart(categoryCtx, {
            type: 'bar',
            data: {
                labels: shortLabels,
                datasets: [{
                    label: 'Jumlah',
                    data: @json($categoryData),
                    backgroundColor: @json(array_slice($categoryColors, 0, count($categoryLabels))),
                    borderColor: @json(array_slice($categoryColors, 0, count($categoryLabels))),
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                // Kembalikan label asli di tooltip
                                const index = tooltipItems[0].dataIndex;
                                return @json($categoryLabels)[index];
                            },
                            label: function(context) {
                                return `Jumlah: ${context.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                            font: {
                                size: 11
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        },
                        title: {
                            display: true,
                            text: 'Kategori',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
        @endif
        
        // Animate progress bars
        const progressBars = document.querySelectorAll('.progress-fill');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 300);
        });
    });
    @endif
</script>