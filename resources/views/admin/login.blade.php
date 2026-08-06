<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Polres_Malang.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* Abu-abu Elegan Palette */
            --primary: #4A5568;
            --primary-dark: #2D3748;
            --primary-light: #718096;
            --primary-gradient: linear-gradient(135deg, #4A5568 0%, #1A202C 100%);
            
            /* Secondary - Abu-abu Soft */
            --secondary: #718096;
            --secondary-light: #E2E8F0;
            --secondary-bg: #F7FAFC;
            --secondary-card: #FFFFFF;
            
            /* Accent Colors - Soft & Minimal */
            --success: #48BB78;
            --warning: #ED8936;
            --danger: #FC8181;
            --info: #63B3ED;
            
            /* Text Colors - Hierarki */
            --text-primary: #1A202C;
            --text-secondary: #4A5568;
            --text-light: #A0AEC0;
            --text-white: #FFFFFF;
            --text-muted: #CBD5E0;
            
            /* UI Elements */
            --border-color: #E2E8F0;
            --border-focus: #4A5568;
            --shadow-color: rgba(74, 85, 104, 0.12);
            --hover-shadow: rgba(74, 85, 104, 0.20);
            --input-bg: #F7FAFC;
            
            /* Gradasi untuk left section */
            --left-bg-start: #2D3748;
            --left-bg-end: #1A202C;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--secondary-bg);
        }

        .split-container {
            display: flex;
            min-height: 100vh;
        }

        /* Left Side - Welcome Section with Elegant Gray */
        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, #2D3748 0%, #1A202C 100%);
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
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .welcome-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            letter-spacing: -0.5px;
            color: #FFFFFF;
        }

        .welcome-subtitle {
            font-size: 18px;
            opacity: 0.85;
            margin-bottom: 40px;
            font-weight: 300;
            line-height: 1.7;
            color: #E2E8F0;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin-top: 40px;
        }

        .features-list li {
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            font-size: 15px;
            color: #E2E8F0;
            background: rgba(255, 255, 255, 0.06);
            padding: 14px 18px;
            border-radius: 12px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .features-list li:hover {
            background: rgba(255, 255, 255, 0.10);
            transform: translateX(5px);
        }

        .features-list i {
            font-size: 20px;
            margin-right: 15px;
            background: rgba(255, 255, 255, 0.12);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #A0AEC0;
            flex-shrink: 0;
        }

        .copyright {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            text-align: center;
            padding: 0 20px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 13px;
        }

        /* Right Side - Login Form Section with Elegant Gray */
        .login-section {
            flex: 1;
            background: #F7FAFC;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            background: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(74, 85, 104, 0.10);
            padding: 50px 40px;
            max-width: 450px;
            width: 100%;
            transition: all 0.3s ease;
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .login-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 60px rgba(74, 85, 104, 0.15);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-title {
            font-size: 30px;
            font-weight: 700;
            color: #1A202C;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            font-size: 15px;
            color: #718096;
            font-weight: 400;
        }

        .form-label {
            color: #2D3748;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 2px solid #E2E8F0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #F7FAFC;
            color: #1A202C;
        }

        .form-control::placeholder {
            color: #A0AEC0;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #4A5568;
            box-shadow: 0 0 0 3px rgba(74, 85, 104, 0.08);
            background-color: #FFFFFF;
        }

        .input-group-text {
            background-color: #F7FAFC;
            border: 2px solid #E2E8F0;
            border-right: none;
            color: #718096;
            padding: 0 18px;
        }

        .password-toggle {
            background: #F7FAFC;
            border: 2px solid #E2E8F0;
            border-left: none;
            color: #718096;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: #2D3748;
            background: #EDF2F7;
        }

        .login-btn {
            background: linear-gradient(135deg, #4A5568 0%, #2D3748 100%);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-weight: 600;
            font-size: 15px;
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
            box-shadow: 0 10px 25px rgba(74, 85, 104, 0.25);
            background: linear-gradient(135deg, #2D3748 0%, #1A202C 100%);
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.7s ease;
        }

        .login-btn:hover::after {
            left: 100%;
        }

        .error-message {
            background-color: #FED7D7;
            border: 1px solid #FEB2B2;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #9B2C2C;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message i {
            font-size: 18px;
            color: #FC8181;
        }

        .success-message {
            background-color: #C6F6D5;
            border: 1px solid #9AE6B4;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #276749;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 18px;
            color: #48BB78;
        }

        .form-text {
            color: #718096;
            font-size: 13px;
        }

        .form-text i {
            color: #A0AEC0;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        /* Divider */
        .divider {
            border-top: 1px solid #E2E8F0;
            margin-top: 24px;
            padding-top: 20px;
        }

        .divider-text {
            color: #A0AEC0;
            font-size: 13px;
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
                font-size: 16px;
            }
            
            .features-list li {
                justify-content: center;
                text-align: left;
            }
            
            .copyright {
                position: relative;
                bottom: auto;
                margin-top: 40px;
            }
            
            .login-section {
                padding: 30px 20px;
            }
            
            .login-card {
                padding: 35px 28px;
            }
        }

        @media (max-width: 576px) {
            .welcome-title {
                font-size: 26px;
            }
            
            .login-title {
                font-size: 26px;
            }
            
            .login-card {
                padding: 25px 20px;
            }

            .features-list li {
                padding: 12px 14px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <!-- Left Side - Welcome Section -->
        <div class="welcome-section">
            <!-- Logo Section -->
            <div style="display: flex; justify-content: center; align-items: center; 
                        margin: 10px 0 30px 0; padding: 0 20px;">
                <img src="{{ asset('images/Logo_Polres_Malang.png') }}" 
                    alt="Logo Polres Malang" 
                    style="width: min(160px, 60%); height: auto; max-width: 200px; 
                           filter: drop-shadow(0 4px 12px rgba(0,0,0,0.20));
                           transition: transform 0.3s ease;"
                    onmouseover="this.style.transform='scale(1.05)'"
                    onmouseout="this.style.transform='scale(1)'">
            </div>
            
            <!-- Content Section -->
            <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
                
                <!-- Title -->
                <h1 class="welcome-title" style="text-align: center;">
                    Dashboard Monitoring Administrator
                </h1>
                
                <!-- Description -->
                <p class="welcome-subtitle" style="text-align: center;">
                    Polres Malang berkomitmen memberikan pelayanan terbaik melalui sistem pengaduan masyarakat yang responsif, transparan, dan terintegrasi, guna menciptakan kamtibmas yang kondusif.
                </p>
                
                <!-- Features -->
                <div style="margin-bottom: 30px;">
                    <ul class="features-list" style="max-width: 550px; margin: 0 auto;">
                        <li>
                            <i class="fas fa-chart-line"></i>
                            <span>Pantau statistik laporan secara real-time</span>
                        </li>
                        <li>
                            <i class="fas fa-tasks"></i>
                            <span>Kelola dan prioritaskan pengaduan masyarakat</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="copyright">
                <p style="margin: 0;">
                    &copy; 2026 Polres Malang - Sistem Pengaduan Masyarakat
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
                            <i class="fas fa-envelope" style="font-size: 14px;"></i>
                            <span>Email</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-at" style="color: #718096;"></i>
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
                            <i class="fas fa-lock" style="font-size: 14px;"></i>
                            <span>Password</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-key" style="color: #718096;"></i>
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
                                style="border-left: none;"
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

                    <div class="mb-4 d-flex justify-content-center">
                        <div class="g-recaptcha"
                            data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                        </div>
                    </div>
                    <button type="submit" class="login-btn" id="loginButton">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Login ke Dashboard
                    </button>
                </form>

                <!-- Footer Note -->
                <div class="divider">
                    <p class="divider-text" style="text-align: center; margin: 0;">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Akses terbatas hanya untuk administrator yang berwenang
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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