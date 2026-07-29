<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Fix Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #7209b7;
            --success: #4cc9f0;
            --light-bg: #f8fafd;
            --dark-bg: #0a0e17;
            --text-primary: #2d3748;
            --text-secondary: #718096;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .split-container {
            display: flex;
            min-height: 100vh;
        }

        /* Left Side - Welcome Section */
        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            background: linear-gradient(135deg, #4a7bff 0%, #1e3a8a 100%); 
            color: white;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .logo-container {
            width: 100px;
            height: 100px;
            background: transparent; /* BACKGROUND DIHAPUS */
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            backdrop-filter: none; /* OPSIONAL: hapus blur */
            border: none; /* OPSIONAL: hapus border */
        }

        .logo-icon {
            font-size: 48px;
            color: white;
        }

        .welcome-title {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .welcome-subtitle {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 40px;
            font-weight: 300;
            line-height: 1.6;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin-top: 40px;
        }

        .features-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .features-list i {
            font-size: 20px;
            margin-right: 15px;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .copyright {
            position: absolute;
            bottom: 30px;
            left: 50px;
            font-size: 14px;
            opacity: 0.8;
        }

        /* Right Side - Login Form Section */
        .login-section {
            flex: 1;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(67, 97, 238, 0.12);
            padding: 50px 40px;
            max-width: 450px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(67, 97, 238, 0.18);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 10px;
        }

        .login-subtitle {
            font-size: 16px;
            color: var(--text-secondary);
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
            background-color: white;
        }

        .input-group-text {
            background-color: transparent;
            border: 2px solid #e2e8f0;
            border-right: none;
            color: var(--text-secondary);
            padding: 0 18px;
        }

        .password-toggle {
            background: transparent;
            border: 2px solid #e2e8f0;
            border-left: none;
            color: var(--text-secondary);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .login-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-weight: 600;
            font-size: 16px;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .login-btn:hover::after {
            left: 100%;
        }

        .error-message {
            background-color: #fee;
            border: 1px solid #fcc;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #c00;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message i {
            font-size: 18px;
        }

        .success-message {
            background-color: #e8f7ef;
            border: 1px solid #b8e6cf;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #0a6;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .split-container {
                flex-direction: column;
            }
            
            .welcome-section {
                padding: 40px 30px;
                text-align: center;
            }
            
            .welcome-title {
                font-size: 32px;
            }
            
            .welcome-subtitle {
                font-size: 18px;
            }
            
            .features-list li {
                justify-content: center;
            }
            
            .copyright {
                position: relative;
                bottom: auto;
                left: auto;
                margin-top: 40px;
            }
            
            .login-section {
                padding: 30px 20px;
            }
            
            .login-card {
                padding: 40px 30px;
            }
        }

        @media (max-width: 576px) {
            .welcome-title {
                font-size: 28px;
            }
            
            .login-title {
                font-size: 28px;
            }
            
            .login-card {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <!-- Left Side - Welcome Section -->
        <div class="welcome-section">
    <!-- Logo Section -->
            <div class="logo-section" style="display: flex; justify-content: center; align-items: center; 
                                            margin: 30px 0 40px 0; padding: 0 20px;">
                <img src="{{ asset('images/logo_fix_malang.png') }}" 
                    alt="Logo Fix Malang" 
                    style="width: min(300px, 80%); height: auto;">
            </div>
            
            <!-- Content Section -->
            <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
                
                <!-- Title -->
                <h1 class="welcome-title" style="text-align: center; margin-bottom: 20px;">
                    Selamat Datang di<br>Dashboard Admin
                </h1>
                
                <!-- Description -->
                <p class="welcome-subtitle" style="text-align: center; font-size: 17px; line-height: 1.6; 
                                                margin-bottom: 35px; color: rgba(255, 255, 255, 0.9);">
                    Sistem Pengaduan Masyarakat Fix Malang yang memungkinkan administrator 
                    untuk mengelola laporan, memantau progres, dan memberikan solusi 
                    secara efektif.
                </p>
                
                <!-- Features -->
                <div style="margin-bottom: 40px;">
                    <ul class="features-list" style="max-width: 550px; margin: 0 auto; padding: 0; list-style: none;">
                        <li style="display: flex; align-items: center; margin-bottom: 20px; 
                                background: rgba(255, 255, 255, 0.08); padding: 15px; border-radius: 10px;">
                            <i class="fas fa-chart-line" style="font-size: 22px; margin-right: 15px; 
                                                            color: #4cc9f0;"></i>
                            <span style="font-size: 16px;">Pantau statistik laporan secara real-time</span>
                        </li>
                        <li style="display: flex; align-items: center; margin-bottom: 20px; 
                                background: rgba(255, 255, 255, 0.08); padding: 15px; border-radius: 10px;">
                            <i class="fas fa-tasks" style="font-size: 22px; margin-right: 15px; 
                                                        color: #7209b7;"></i>
                            <span style="font-size: 16px;">Kelola dan prioritaskan pengaduan masyarakat</span>
                        </li>
                        <li style="display: flex; align-items: center; 
                                background: rgba(255, 255, 255, 0.08); padding: 15px; border-radius: 10px;">
                            <i class="fas fa-shield-alt" style="font-size: 22px; margin-right: 15px; 
                                                            color: #4361ee;"></i>
                            <span style="font-size: 16px;">Akses aman dengan autentikasi terenkripsi</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="copyright" style="position: absolute; bottom: 30px; left: 0; right: 0; 
                                        text-align: center; padding: 0 20px;">
                <p style="margin: 0; font-size: 14px; color: rgba(255, 255, 255, 0.7);">
                    &copy; 2024 Fix Malang - Sistem Pengaduan Masyarakat
                </p>
        </div>
    </div>

        <!-- Right Side - Login Form Section -->
        <div class="login-section">
            <div class="login-card">
                <!-- Login Header -->
                <div class="login-header">
                    <h2 class="login-title">Admin Login</h2>
                    <p class="login-subtitle">Masuk ke dashboard administrator</p>
                </div>

                <!-- Error/Success Messages -->
                @if($errors->any())
                    <div class="error-message pulse-animation">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="error-message pulse-animation">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            <span>Email</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-at"></i>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="admin@fixmalang.com"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            <span>Password</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="form-control" 
                                placeholder="Masukkan password"
                                required
                            >
                            <button 
                                type="button" 
                                class="input-group-text password-toggle"
                                onclick="togglePassword()"
                            >
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="form-text mt-2">
                            <i class="fas fa-info-circle"></i>
                            Pastikan informasi login Anda aman dan rahasia
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="login-btn" id="loginButton">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Login ke Dashboard
                    </button>
                </form>

                <!-- Footer Note -->
                <div class="mt-4 pt-3 text-center" style="border-top: 1px solid #e2e8f0;">
                    <p style="font-size: 13px; color: var(--text-secondary);">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Akses terbatas hanya untuk administrator yang berwenang
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form Submission Animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            button.disabled = true;
            button.classList.add('disabled');
            
            // Re-enable after 3 seconds if form doesn't submit (safety)
            setTimeout(() => {
                if (button.disabled) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.classList.remove('disabled');
                }
            }, 3000);
        });

        // Auto-focus on email input
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[name="email"]');
            if (emailInput) {
                emailInput.focus();
            }
        });

        // Add enter key support
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !document.getElementById('loginButton').disabled) {
                document.getElementById('loginForm').submit();
            }
        });
    </script>
</body>
</html>