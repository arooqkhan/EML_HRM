<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM Pulse - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="https://img.freepik.com/premium-vector/hrm-human-resource-management-icon-label-badge-vector-stock-illustration_100456-10641.jpg">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Grid */
        .grid-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(56, 189, 248, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Floating Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: #38bdf8;
            top: -200px;
            left: -200px;
            opacity: 0.3;
            animation: orbFloat 15s ease-in-out infinite;
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            background: #a78bfa;
            bottom: -250px;
            right: -250px;
            opacity: 0.3;
            animation: orbFloat 20s ease-in-out infinite reverse;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            background: #f472b6;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.2;
            animation: orbPulse 10s ease-in-out infinite;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, 50px) scale(1.1); }
        }

        @keyframes orbPulse {
            0%, 100% { opacity: 0.2; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.3; transform: translate(-50%, -50%) scale(1.2); }
        }

        /* Main Container */
        .container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1300px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 50px;
        }

        /* Left Side - Branding */
        .brand-section {
            flex: 1;
            color: white;
            padding: 40px;
            animation: slideInLeft 1s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .brand-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #38bdf8, #a78bfa);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            box-shadow: 0 20px 30px -10px rgba(56, 189, 248, 0.3);
            animation: iconPop 1s ease-out;
        }

        @keyframes iconPop {
            0% { transform: scale(0); }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .brand-icon i {
            font-size: 40px;
            color: white;
        }

        .brand-title {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-highlight {
            background: linear-gradient(135deg, #38bdf8, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-description {
            font-size: 18px;
            color: #94a3b8;
            margin-bottom: 40px;
            line-height: 1.6;
            max-width: 500px;
        }

        /* Stats */
        .stats-container {
            display: flex;
            gap: 40px;
        }

        .stat-item {
            animation: fadeInUp 1s ease-out;
            animation-fill-mode: both;
        }

        .stat-item:nth-child(1) { animation-delay: 0.2s; }
        .stat-item:nth-child(2) { animation-delay: 0.4s; }
        .stat-item:nth-child(3) { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
        }

        /* Right Side - Login Card */
        .login-section {
            flex: 1;
            max-width: 450px;
            animation: slideInRight 1s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 40px;
            padding: 50px 40px;
            box-shadow: 0 50px 70px -20px rgba(0, 0, 0, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h2 {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #94a3b8;
            font-size: 16px;
        }

        /* Alert */
        .alert-modern {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 20px;
            padding: 16px 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #f87171;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .alert-modern i {
            font-size: 20px;
        }

        .alert-modern span {
            flex: 1;
            font-size: 14px;
        }

        .alert-close {
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        /* Form */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 18px;
            transition: all 0.3s;
            z-index: 2;
        }

        .form-input {
            width: 100%;
            height: 60px;
            background: rgba(255, 255, 255, 0.02);
            border: 1.5px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 0 20px 0 50px;
            color: white;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #38bdf8;
            background: rgba(56, 189, 248, 0.05);
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }

        .form-input:focus + .input-icon {
            color: #38bdf8;
            transform: translateY(-50%) scale(1.1);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            cursor: pointer;
            font-size: 18px;
            transition: color 0.3s;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #38bdf8;
        }

        /* Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 0;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #94a3b8;
            font-size: 14px;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #38bdf8;
        }

        .forgot-link {
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .forgot-link:hover {
            color: #38bdf8;
        }

        /* Login Button */
        .login-btn {
            width: 100%;
            height: 60px;
            background: linear-gradient(135deg, #38bdf8, #a78bfa);
            border: none;
            border-radius: 20px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px -10px rgba(56, 189, 248, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .login-btn.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Signup Link */
        .signup-container {
            text-align: center;
            margin-top: 30px;
            color: #64748b;
            font-size: 14px;
        }

        .signup-link {
            color: #38bdf8;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: color 0.3s;
        }

        .signup-link:hover {
            color: #a78bfa;
        }

        /* Features */
        .features {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .feature {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #94a3b8;
            font-size: 13px;
        }

        .feature i {
            color: #38bdf8;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .brand-section {
                text-align: center;
            }
            
            .brand-description {
                margin-left: auto;
                margin-right: auto;
            }
            
            .stats-container {
                justify-content: center;
            }
            
            .login-section {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 40px 20px;
            }
            
            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .stats-container {
                flex-wrap: wrap;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="grid-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="container">
        <!-- Left Brand Section -->
        <div class="brand-section">
            <div class="brand-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <h1 class="brand-title">
                HRM <span class="brand-highlight">Pulse</span>
            </h1>
            <p class="brand-description">
                Next-gen HR management platform that helps you track, analyze, and optimize your workforce with AI-powered insights.
            </p>
            
           
        </div>

        <!-- Right Login Section -->
        <div class="login-section">
            <div class="login-card">
                <div class="login-header">
                    <h2>Welcome Back!</h2>
                    <p>Sign in to continue to HRM Pulse</p>
                </div>

                <!-- Error Messages -->
                @if (session('error'))
                <div class="alert-modern" id="alertMessage">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                    <i class="fas fa-times alert-close" onclick="this.parentElement.remove()"></i>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert-modern" id="alertMessage">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                    <i class="fas fa-times alert-close" onclick="this.parentElement.remove()"></i>
                </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label class="form-label">EMAIL ADDRESS</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" 
                                   class="form-input" 
                                   name="email" 
                                   placeholder="Enter your email"
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label class="form-label">PASSWORD</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" 
                                   class="form-input" 
                                   name="password" 
                                   id="password"
                                   placeholder="Enter your password"
                                   required>
                            <i class="fas fa-eye password-toggle" id="togglePassword" onclick="togglePassword()"></i>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="form-options">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <!-- <a href="{{ route('password.request') }}" class="forgot-link">
                            <i class="fas fa-question-circle"></i>
                            Forgot Password?
                        </a> -->
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-btn" id="loginBtn">
                        <i class="fas fa-arrow-right"></i>
                        <span>Sign In</span>
                    </button>

                    <!-- Sign Up -->
                    <!-- <div class="signup-container">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="signup-link">
                            Create Account <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div> -->

                    <!-- Features -->
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <span>Fast</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Password Toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');
            
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

        // Auto dismiss alert
        setTimeout(() => {
            const alert = document.querySelector('.alert-modern');
            if (alert) {
                alert.style.transition = 'opacity 0.5s, transform 0.5s';
                alert.style.opacity = '0';
                alert.style.transform = 'translateX(20px)';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);

        // Loading state on form submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.innerHTML = '<i class="fas fa-circle-notch"></i><span>Authenticating...</span>';
        });

        // Input animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = '#38bdf8';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.querySelector('.input-icon').style.color = '#64748b';
                }
            });
        });

        // Parallax effect on orbs
        document.addEventListener('mousemove', function(e) {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            const orb1 = document.querySelector('.orb-1');
            const orb2 = document.querySelector('.orb-2');
            
            orb1.style.transform = `translate(${mouseX * 50}px, ${mouseY * 50}px)`;
            orb2.style.transform = `translate(${-mouseX * 50}px, ${-mouseY * 50}px)`;
        });
    </script>
</body>
</html>