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

    /* Sidebar Styling */
    .sidebar {
      min-height: 100vh;
      background: linear-gradient(180deg, var(--sidebar-bg) 0%, #131722 100%);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      padding: 25px 15px;
      box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding-bottom: 25px;
      margin-bottom: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
      color: var(--primary-color);
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
      color: #b0b3b8;
      padding: 12px 15px;
      border-radius: 10px;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar-nav a:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      transform: translateX(5px);
    }

    .sidebar-nav a.active {
      background-color: var(--primary-color);
      color: #fff;
      box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
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
      color: #2d3748;
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 0;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }

    /* Card Styling */
    .main-card {
      background-color: var(--card-bg);
      border-radius: 18px;
      border: none;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
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
      background-color: var(--primary-color);
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
      border-bottom: 1px solid #f1f3f9;
      transition: all 0.2s ease;
    }

    .table tbody tr:hover {
      background-color: rgba(67, 97, 238, 0.05);
      transform: translateY(-1px);
    }

    .table tbody td {
      padding: 16px 15px;
      vertical-align: middle;
      border-top: none;
      border-bottom: 1px solid #f1f3f9;
      max-width: 250px;
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
      background: #333;
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
      color: var(--primary-color);
      font-size: 0.8rem;
      padding: 2px 0;
      cursor: pointer;
      font-weight: 600;
      display: block;
      margin-top: 5px;
    }

    .read-more-btn:hover {
      text-decoration: underline;
    }

    /* Badge Styling */
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
      background-color: var(--warning-color) !important;
    }

    .bg-info {
      background-color: var(--success-color) !important;
    }

    .bg-success {
      background-color: #2ecc71 !important;
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
      background-color: var(--danger-color);
      border-color: var(--danger-color);
    }

    .btn-danger:hover {
      background-color: #d32f2f;
      border-color: #d32f2f;
    }

    .btn-outline-primary {
      border-color: var(--primary-color);
      color: var(--primary-color);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    /* Form Select */
    .form-select-sm {
      border-radius: 8px;
      padding: 6px 30px 6px 12px;
      font-size: 0.85rem;
      border: 1px solid #e2e8f0;
      background-color: #f8fafc;
      transition: all 0.3s ease;
      min-width: 120px;
    }

    .form-select-sm:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
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
      border-color: var(--primary-color);
      z-index: 10;
      position: relative;
    }

    /* Empty state */
    .text-muted {
      color: #a0aec0 !important;
    }

    /* Stats summary */
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      flex: 1;
      min-width: 150px;
    }

    .stat-card h3 {
      font-size: 0.9rem;
      color: var(--text-light);
      margin-bottom: 8px;
      font-weight: 600;
    }

    .stat-card .value {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary-color);
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
      background: #f1f1f1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--secondary-color);
    }

    /* Tab Styling */
    .nav-tabs {
      border-bottom: 2px solid #e9ecef;
      margin-bottom: 25px;
    }
    
    .nav-tabs .nav-link {
      color: #6c757d;
      border: none;
      padding: 12px 24px;
      font-weight: 600;
      border-radius: 8px 8px 0 0;
      margin-right: 5px;
      transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link:hover {
      color: var(--primary-color);
      background-color: rgba(67, 97, 238, 0.05);
    }
    
    .nav-tabs .nav-link.active {
      color: var(--primary-color);
      background-color: white;
      border: 2px solid #e9ecef;
      border-bottom: 2px solid white;
      position: relative;
      top: 2px;
    }
    
    .tab-content {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
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
      color: #e2e8f0;
      margin-bottom: 20px;
    }

    .empty-state h4 {
      color: #718096;
      margin-bottom: 10px;
    }

    .empty-state p {
      color: #a0aec0;
      max-width: 400px;
      margin: 0 auto;
    }

    /* Modal Styling */
    .modal-content {
      border-radius: 15px;
      border: none;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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
      background: #f8f9fa;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #e9ecef;
      max-height: 400px;
      overflow-y: auto;
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