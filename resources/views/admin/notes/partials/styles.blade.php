<style>
    :root {
      --primary-color: #4A5568;
      --secondary-color: #2D3748;
      --sidebar-bg: #1A202C;
      --card-bg: #ffffff;
      --text-light: #718096;
      --success-color: #48BB78;
      --warning-color: #ED8936;
      --danger-color: #FC8181;
    }

    body {
      background-color: #F7FAFC;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #2D3748;
    }

    /* Sidebar Styling - Abu-abu Elegan */
    .sidebar {
      min-height: 100vh;
      background: linear-gradient(180deg, #1A202C 0%, #0D1117 100%);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      padding: 25px 15px;
      box-shadow: 5px 0 15px rgba(0, 0, 0, 0.15);
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding-bottom: 25px;
      margin-bottom: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .sidebar-header h2 {
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      margin: 0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar-header h2 i {
      color: #A0AEC0;
    }

    .sidebar-nav {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .sidebar-nav a {
      display: flex;
      align-items: center;
      gap: 12px;
      color: #A0AEC0;
      padding: 12px 15px;
      border-radius: 10px;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar-nav a:hover {
      background-color: rgba(255, 255, 255, 0.08);
      color: #FFFFFF;
      transform: translateX(5px);
    }

    .sidebar-nav a.active {
      background-color: #1D468F;
      color: #FFFFFF;
      box-shadow: 0 4px 12px rgba(74, 85, 104, 0.3);
    }

    .sidebar-nav a i {
      font-size: 1.2rem;
      width: 24px;
      text-align: center;
    }

    .sidebar-footer {
      position: absolute;
      bottom: 25px;
      width: calc(100% - 30px);
    }

    /* Main Content */
    .content {
      margin-left: 260px;
      padding: 30px;
      transition: all 0.3s ease;
    }

    @media (max-width: 992px) {
      .sidebar {
        width: 80px;
        padding: 20px 10px;
      }
      .sidebar-header h2 span,
      .sidebar-nav a span {
        display: none;
      }
      .sidebar-nav a {
        justify-content: center;
        padding: 15px 5px;
      }
      .content {
        margin-left: 80px;
      }
      .sidebar-nav a:hover {
        transform: none;
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 0;
        padding: 0;
        overflow: hidden;
      }
      .content {
        margin-left: 0;
      }
    }

    /* Header Content */
    .content-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 15px;
    }

    .content-header h1 {
      font-weight: 700;
      color: #1A202C;
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 0;
    }

    .btn-primary {
      background: linear-gradient(135deg, #4A5568 0%, #2D3748 100%);
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      color: white;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #2D3748 0%, #1A202C 100%);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(74, 85, 104, 0.3);
      color: white;
    }

    .btn-primary i {
      color: white;
    }

    /* Card Styling */
    .main-card {
      background-color: var(--card-bg);
      border-radius: 18px;
      border: 1px solid #E2E8F0;
      box-shadow: 0 8px 30px rgba(74, 85, 104, 0.06);
      overflow: hidden;
      padding: 25px;
    }

    /* Table Styling */
    .table-container {
      overflow-x: auto;
      border-radius: 12px;
    }

    .table {
      margin-bottom: 0;
      width: 100%;
    }

    .table thead th {
      background: linear-gradient(135deg, #1F4EA1);
      color: white;
      font-weight: 600;
      padding: 18px 15px;
      border: none;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      white-space: nowrap;
    }

    .table tbody tr {
      border-bottom: 1px solid #EDF2F7;
      transition: all 0.2s ease;
    }

    .table tbody tr:hover {
      background-color: rgba(74, 85, 104, 0.04);
      transform: translateY(-1px);
    }

    .table tbody td {
      padding: 16px 15px;
      vertical-align: middle;
      border-top: none;
      border-bottom: 1px solid #EDF2F7;
      max-width: 250px;
      color: #2D3748;
    }

    /* Fix untuk kolom judul dan isi */
    .table tbody td:nth-child(4) { /* Kolom Judul */
      max-width: 200px;
      min-width: 150px;
    }

    .table tbody td:nth-child(5) { /* Kolom Isi */
      max-width: 300px;
      min-width: 200px;
      position: relative;
    }

    /* Line clamping untuk teks panjang */
    .truncate-text {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: 3em;
      line-height: 1.5em;
      color: #2D3748;
    }

    /* Tooltip untuk konten yang dipotong */
    .content-preview {
      cursor: help;
      position: relative;
    }

    .content-preview:hover::after {
      content: attr(data-fulltext);
      position: absolute;
      left: 0;
      top: 100%;
      background: #2D3748;
      color: white;
      padding: 10px 15px;
      border-radius: 6px;
      font-size: 0.9rem;
      white-space: normal;
      max-width: 400px;
      z-index: 1000;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Read more button */
    .read-more-btn {
      background: none;
      border: none;
      color: #4A5568;
      font-size: 0.8rem;
      padding: 2px 0;
      cursor: pointer;
      font-weight: 600;
      display: block;
      margin-top: 5px;
    }

    .read-more-btn:hover {
      text-decoration: underline;
      color: #2D3748;
    }

    /* Badge Styling - Abu-abu Elegan */
    .badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.75rem;
      max-width: 120px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      display: inline-block;
    }

    .bg-warning {
      background-color: #EDF2F7 !important;
      color: #4A5568 !important;
    }

    .bg-info {
      background-color: #E2E8F0 !important;
      color: #2D3748 !important;
    }

    .bg-success {
      background-color: #CBD5E0 !important;
      color: #1A202C !important;
    }

    /* Action Buttons */
    .action-group {
      display: flex;
      gap: 8px;
      align-items: center;
      flex-wrap: wrap;
      min-width: 160px;
    }

    .btn-sm {
      padding: 6px 12px;
      border-radius: 8px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .btn-danger {
      background-color: #FC8181;
      border-color: #FC8181;
      color: white;
    }

    .btn-danger:hover {
      background-color: #F56565;
      border-color: #F56565;
      color: white;
    }

    .btn-outline-primary {
      border-color: #4A5568;
      color: #4A5568;
    }

    .btn-outline-primary:hover {
      background-color: #4A5568;
      border-color: #4A5568;
      color: white;
    }

    /* Form Select */
    .form-select-sm {
      border-radius: 8px;
      padding: 6px 30px 6px 12px;
      font-size: 0.85rem;
      border: 1px solid #E2E8F0;
      background-color: #F7FAFC;
      transition: all 0.3s ease;
      min-width: 120px;
      color: #2D3748;
    }

    .form-select-sm:focus {
      border-color: #4A5568;
      box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.1);
      background-color: white;
    }

    /* Image styling */
    .note-image {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .note-image:hover {
      transform: scale(1.8);
      border-color: #4A5568;
      z-index: 10;
      position: relative;
    }

    /* Empty state */
    .text-muted {
      color: #A0AEC0 !important;
    }

    /* Stats summary - Abu-abu Elegan */
    .stats-summary {
      display: flex;
      gap: 20px;
      margin-bottom: 25px;
      flex-wrap: wrap;
    }

    .stat-card {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(74, 85, 104, 0.06);
      border: 1px solid #E2E8F0;
      flex: 1;
      min-width: 150px;
    }

    .stat-card h3 {
      font-size: 0.9rem;
      color: #718096;
      margin-bottom: 8px;
      font-weight: 600;
    }

    .stat-card .value {
      font-size: 1.8rem;
      font-weight: 700;
      color: #2D3748;
    }

    /* Animation for new elements */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .table tbody tr {
      animation: fadeIn 0.5s ease forwards;
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #EDF2F7;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: #4A5568;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #2D3748;
    }

    /* Tab Styling - Abu-abu Elegan */
    .nav-tabs {
      border-bottom: 2px solid #E2E8F0;
      margin-bottom: 25px;
    }
    
    .nav-tabs .nav-link {
      color: #718096;
      border: none;
      padding: 12px 24px;
      font-weight: 600;
      border-radius: 8px 8px 0 0;
      margin-right: 5px;
      transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link:hover {
      color: #4A5568;
      background-color: rgba(74, 85, 104, 0.05);
    }
    
    .nav-tabs .nav-link.active {
      color: #4A5568;
      background-color: white;
      border: 2px solid #E2E8F0;
      border-bottom: 2px solid white;
      position: relative;
      top: 2px;
    }
    
    .tab-content {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 8px 30px rgba(74, 85, 104, 0.06);
      border: 1px solid #E2E8F0;
      border-top-left-radius: 0;
    }
    
    /* Hide/Show Content */
    .tab-pane {
      display: none;
    }
    
    .tab-pane.active {
      display: block;
      animation: fadeIn 0.5s ease;
    }

    /* Empty state styling */
    .empty-state {
      text-align: center;
      padding: 60px 20px;
    }

    .empty-state i {
      font-size: 4rem;
      color: #CBD5E0;
      margin-bottom: 20px;
    }

    .empty-state h4 {
      color: #4A5568;
      margin-bottom: 10px;
    }

    .empty-state p {
      color: #A0AEC0;
      max-width: 400px;
      margin: 0 auto;
    }

    /* Modal Styling - Abu-abu Elegan */
    .modal-content {
      border-radius: 15px;
      border: none;
      box-shadow: 0 10px 40px rgba(74, 85, 104, 0.2);
    }

    .modal-header {
      background: linear-gradient(135deg, #4A5568 0%, #2D3748 100%);
      color: white;
      border-radius: 15px 15px 0 0;
      padding: 20px 25px;
      border: none;
    }

    .modal-body {
      padding: 25px;
    }

    .content-full {
      white-space: pre-wrap;
      word-wrap: break-word;
      background: #F7FAFC;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #E2E8F0;
      max-height: 400px;
      overflow-y: auto;
      color: #2D3748;
    }

    /* Responsive table fixes */
    @media (max-width: 1200px) {
      .table tbody td:nth-child(4),
      .table tbody td:nth-child(5) {
        max-width: 200px;
      }
    }

    @media (max-width: 992px) {
      .table tbody td:nth-child(4),
      .table tbody td:nth-child(5) {
        max-width: 150px;
      }
      .action-group {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    @media (max-width: 768px) {
      .table tbody td {
        font-size: 0.9rem;
        padding: 12px 8px;
      }
      .table tbody td:nth-child(4),
      .table tbody td:nth-child(5) {
        max-width: 120px;
      }
    }
</style>