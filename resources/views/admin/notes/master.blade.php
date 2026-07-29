
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Dashboard - Notes Management</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo_fix_malang_favicon.png') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo_fix_malang.png') }}">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3a0ca3;
      --sidebar-bg: #1a1d28;
      --card-bg: #ffffff;
      --text-light: #8a8d93;
      --success-color: #4cc9f0;
      --warning-color: #f8961e;
      --danger-color: #f94144;
    }

    body {
      background-color: #f5f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    /* Import semua style CSS dari file asli */
    @include('admin.notes.partials.styles')
  </style>
</head>
<body>
  <!-- Sidebar -->
  @include('admin.notes.partials.sidebar')

  <!-- Main Content -->
  <div class="content">
    <!-- Header -->
    @include('admin.notes.partials.header')

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="dashboard-tab-btn" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab">
          <i class="bi bi-bar-chart"></i> Dashboard Statistik
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="table-tab-btn" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab">
          <i class="bi bi-table"></i> Tabel Pengaduan
        </button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="myTabContent">
      <!-- Dashboard Tab -->
      <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
        @include('admin.notes.dashboard')
      </div>

      <!-- Table Tab -->
      <div class="tab-pane fade" id="table" role="tabpanel">
        @include('admin.notes.table')
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // JavaScript utama
    document.addEventListener('DOMContentLoaded', function() {
      // Update sidebar active state based on URL hash
      const dashboardTab = document.getElementById('dashboard-tab');
      const tableTab = document.getElementById('table-tab');
      const pageTitle = document.getElementById('page-title');
      
      // Tab switching logic
      const tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
      tabButtons.forEach(button => {
        button.addEventListener('shown.bs.tab', function(event) {
          const target = event.target.getAttribute('data-bs-target');
          
          // Update sidebar active state
          if (target === '#dashboard') {
            dashboardTab.classList.add('active');
            tableTab.classList.remove('active');
            pageTitle.textContent = 'Dashboard Pengaduan';
          } else if (target === '#table') {
            tableTab.classList.add('active');
            dashboardTab.classList.remove('active');
            pageTitle.textContent = 'Tabel Pengaduan';
          }
        });
      });
      
      // Sidebar navigation
      dashboardTab.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('dashboard-tab-btn').click();
      });
      
      tableTab.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('table-tab-btn').click();
      });
      
      // Row hover effect
      const tableRows = document.querySelectorAll('.table tbody tr');
      tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
        });
        row.addEventListener('mouseleave', function() {
          this.style.boxShadow = 'none';
        });
      });

      // Add confirmation for delete
      const deleteButtons = document.querySelectorAll('form[action*="destroy"] button');
      deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          if (!confirm('Yakin ingin menghapus data ini?')) {
            e.preventDefault();
          }
        });
      });
    });
  </script>

</body>
</html>