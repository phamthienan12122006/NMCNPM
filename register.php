<?php
session_start();
require_once __DIR__ . '/src/includes/config.php';
require_once __DIR__ . '/src/includes/cart_order_helpers.php';
$canteenSettings = getCanteenSettings($conn);
$cName = $canteenSettings['canteen_name'] ?? 'Nhà Hàng Gourmet';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - <?php echo htmlspecialchars($cName); ?></title>
    <link rel="icon" type="image/png" href="assets/img/hero/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Quicksand', 'sans-serif'],
                    }
                }
            }
        };
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="assets/js/auth-theme.js"></script>
</head>
<body class="min-h-screen w-full flex items-center justify-center p-2 transition-colors duration-300">
    <!-- Animated Canvas Background -->
    <canvas id="waveCanvas" class="fixed inset-0 -z-10"></canvas>

    <!-- Floating Theme Toggle Button -->
    <button type="button" onclick="toggleAuthTheme()" class="fixed top-4 right-4 z-50 p-2.5 rounded-full bg-white/80 dark:bg-slate-800/80 backdrop-blur-md border border-orange-100 dark:border-slate-700 text-gray-700 dark:text-amber-400 shadow-lg hover:scale-110 active:scale-95 transition-all" title="Chuyển đổi giao diện Sáng / Tối">
        <i data-lucide="sun" class="w-5 h-5 hidden dark:block"></i>
        <i data-lucide="moon" class="w-5 h-5 block dark:hidden"></i>
    </button>

    <!-- Floating Ornaments -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden -z-5">
        <div class="absolute text-6xl animate-float" style="top: 15%; right: 8%; animation-delay: 0s;">🍕</div>
        <div class="absolute text-5xl animate-float" style="bottom: 20%; left: 10%; animation-delay: 1s;">🍴</div>
        <div class="absolute text-5xl animate-float" style="top: 40%; right: 5%; animation-delay: 2s;">🍔</div>
        <div class="absolute text-4xl animate-float" style="top: 25%; left: 8%; animation-delay: 3.5s;">🥄</div>
        <div class="absolute text-4xl opacity-70 animate-float" style="bottom: 15%; right: 12%; animation-delay: 1.5s;">🌮</div>
        <div class="absolute text-5xl opacity-60 animate-float" style="top: 60%; left: 12%; animation-delay: 2.5s;">🥗</div>
    </div>

    <!-- Toast Container -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Paimon & Bubble -->
    <div class="bubble" id="paimon-bubble">Mừng bạn đến với <?php echo htmlspecialchars($cName); ?> \o/</div>
    <img src="assets/img/paimon_sticker.png" class="paimon" alt="Paimon">

    <!-- Auth Card -->
    <div class="relative z-10 w-full max-w-sm my-0">
        <div class="glass-card rounded-2xl p-8 transition-all duration-500 hover:shadow-2xl">
            <!-- Header -->
            <div class="text-center mb-6 flex flex-col items-center">
                <a href="dashboard.php" class="block w-24 h-24 bg-white dark:bg-slate-800 p-1 rounded-full shadow-lg mb-4 flex items-center justify-center border-2 border-orange-100 dark:border-slate-700 hover:scale-105 active:scale-95 transition-all group">
                    <img src="assets/img/hero/logo.png" alt="Logo" class="w-full h-full object-contain rounded-full group-hover:rotate-12 transition-transform duration-300">
                </a>
                <h1 class="text-3xl font-bold text-gradient mb-2">Đăng ký tài khoản</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 font-light">Mừng bạn đến với <?php echo htmlspecialchars($cName); ?></p>
            </div>

            <form id="form" class="space-y-4">
                <!-- Username Input -->
                <div class="space-y-1.5">
                    <label for="username" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Tên đăng nhập</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <input type="text" id="username" name="username" 
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100" 
                               placeholder="Tên hiển thị của bạn" required>
                    </div>
                </div>

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100" 
                               placeholder="your@email.com" required>
                    </div>
                </div>
                
                <!-- OTP Input -->
                <div class="space-y-1.5">
                    <label for="code" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Mã OTP</label>
                    <div class="flex gap-2">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                            </div>
                            <input type="text" id="code" name="code" 
                                   class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100 font-mono tracking-wider" 
                                   placeholder="Mã 6 số" required>
                        </div>
                        <button type="button" onclick="sendCode()" class="px-4 py-2.5 bg-amber-100 dark:bg-amber-500/20 text-amber-800 dark:text-amber-300 hover:bg-amber-200 dark:hover:bg-amber-500/30 text-sm font-semibold rounded-xl border border-amber-300 dark:border-amber-500/30 transition-colors whitespace-nowrap">
                            Gửi mã
                        </button>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <label for="password" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Mật khẩu</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="password" name="password" 
                               class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100" 
                               placeholder="••••••••" required>
                        <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <p id="passwordError" class="hidden text-[11px] text-red-500 dark:text-red-400 flex items-center gap-1 font-medium mt-1">
                        <i data-lucide="alert-circle" class="w-3 h-3"></i>
                        <span>Mật khẩu phải từ 6 ký tự trở lên</span>
                    </p>
                </div>

                <span class="error-text text-[11px] text-red-500 dark:text-red-400 font-medium hidden" id="error-message"></span>

                <button type="submit" id="submitBtn" class="w-full mt-2 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold rounded-xl disabled:from-gray-300 disabled:to-gray-400 dark:disabled:from-slate-700 dark:disabled:to-slate-800 disabled:cursor-not-allowed transition-all duration-300 flex items-center justify-center gap-2 shadow-lg hover:shadow-orange-500/25 active:scale-[0.98]">
                    <span id="btnText">Đăng ký ngay</span>
                    <div id="btnLoader" class="hidden w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                </button>

                <div class="text-center mt-4">
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                        Đã có tài khoản? 
                        <a href="login.php" class="font-bold text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 transition-colors">Đăng nhập ngay</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Subtle Glow Layer -->
        <div class="absolute -inset-4 -z-10 bg-gradient-to-br from-orange-200/20 to-amber-200/10 dark:from-amber-500/10 dark:to-orange-500/5 rounded-2xl blur-2xl animate-pulse-slow"></div>
    </div>

    <!-- Transition overlay -->
    <div id="page-transition" class="fixed inset-0 bg-white dark:bg-slate-900 z-[9999] transition-opacity duration-500 pointer-events-none opacity-0"></div>

    <script>
        // Lucide Icons
        lucide.createIcons();

        // LOGIC
        const paimonBubble = document.getElementById("paimon-bubble");
        const toastContainer = document.getElementById('toastContainer');

        function setRegisterBubble(text, type = 'normal') {
            if (!paimonBubble) return;
            const isDark = document.documentElement.classList.contains('dark');
            paimonBubble.innerText = text;
            if (type === 'error') {
                paimonBubble.style.color = '#ef4444';
            } else if (type === 'success') {
                paimonBubble.style.color = '#10b981';
            } else if (type === 'warning') {
                paimonBubble.style.color = '#f59e0b';
            } else {
                paimonBubble.style.color = isDark ? '#f8fafc' : '#1e293b';
            }
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            const icon = type === 'success' ? 'check-circle' : 'alert-circle';
            toast.innerHTML = `
                <i data-lucide="${icon}" class="w-5 h-5 ${type === 'success' ? 'text-green-500' : 'text-red-500'}"></i>
                <span class="text-sm font-medium text-gray-800 dark:text-gray-100">${message}</span>
            `;
            toastContainer.appendChild(toast);
            lucide.createIcons();
            setTimeout(() => {
                toast.style.animation = 'toast-out 0.4s ease-in forwards';
                setTimeout(() => toast.remove(), 400);
            }, 3000);
        }

        // Toggle Password
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePassword');
        toggleBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            toggleBtn.innerHTML = isPassword ? '<i data-lucide="eye-off" class="w-4 h-4"></i>' : '<i data-lucide="eye" class="w-4 h-4"></i>';
            lucide.createIcons();
        });

        const passwordError = document.getElementById('passwordError');
        passwordInput.addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                this.classList.add('border-red-400', 'bg-red-50', 'dark:bg-red-950/20');
                if (passwordError) passwordError.classList.remove('hidden');
                setRegisterBubble("Mật khẩu phải từ 6 ký tự trở lên nha!", 'error');
            } else {
                this.classList.remove('border-red-400', 'bg-red-50', 'dark:bg-red-950/20');
                if (passwordError) passwordError.classList.add('hidden');
                if (this.value.length >= 6) {
                    setRegisterBubble("Mật khẩu này trông ổn rồi nè!", 'normal');
                }
            }
        });

        const emailInput = document.getElementById('email');

        function sendCode() {
            let email = emailInput.value.trim();

            if (!email) {
                emailInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                setRegisterBubble("Bạn phải nhập email trước đã chứ!", 'error');
                showToast("Vui lòng nhập email", "error");
                return;
            }

            emailInput.classList.remove("border-red-400", "bg-red-50", "dark:bg-red-950/20");
            setRegisterBubble("Đang kiểm tra email...", 'warning');

            fetch("src/api/email/check_email.php?email=" + encodeURIComponent(email))
            .then(res => res.text())
            .then(data => {
                if(data == "exists") {
                    emailInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                    setRegisterBubble("Email đã tồn tại mất rồi!", 'error');
                    showToast("Email đã được sử dụng", "error");
                    return;
                }

                setRegisterBubble("Đang gửi email... bạn chờ xíu nha.", 'warning');

                let formData = new FormData();
                formData.append("email", email);

                fetch("src/api/email/send_otp.php", { method: "POST", body: formData })
                .then(res => {
                    if (!res.ok) throw new Error("File backend không tồn tại!");
                    return res.text();
                })
                .then(data => {
                    setRegisterBubble(data, 'success'); 
                    showToast("Đã gửi mã OTP", "success");
                    const otpMatch = data.match(/\b\d{6}\b/);
                    if (otpMatch && otpMatch[0]) {
                        const codeInput = document.getElementById('code');
                        if (codeInput) codeInput.value = otpMatch[0];
                    }
                })
                .catch(error => {
                    setRegisterBubble("Có lỗi xảy ra khi gửi mã rồi :(", 'error');
                    showToast("Lỗi gửi OTP", "error");
                });
            })
            .catch(error => {
                setRegisterBubble("Có lỗi khi kiểm tra email :(", 'error');
                showToast("Lỗi kiểm tra email", "error");
            });
        }

        // Submit Form
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');

        document.getElementById("form").onsubmit = function(e) {
            e.preventDefault();

            if (passwordInput.value.length < 6) {
                setRegisterBubble("Mật khẩu phải từ 6 ký tự trở lên nha!", 'error');
                passwordInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                if (passwordError) passwordError.classList.remove('hidden');
                return;
            }

            submitBtn.disabled = true;
            btnText.textContent = 'Đang đăng ký...';
            btnLoader.classList.remove('hidden');

            let formData = new FormData(this);
            formData.append("code", document.getElementById("code").value);
            formData.append("role", "user");
            
            setRegisterBubble("Đang xử lý đăng ký... chờ xí!", 'warning');

            fetch("src/api/register_handler.php", {
                method: "POST",
                body: formData
            })
            .then(res => {
                if (!res.ok) throw new Error("File backend không tồn tại!");
                return res.text();
            })
            .then(data => {
                submitBtn.disabled = false;
                btnText.textContent = 'Đăng ký ngay';
                btnLoader.classList.add('hidden');

                if (data.trim() === "Đăng ký thành công!") {
                    setRegisterBubble("Yay! Đăng ký thành công! Đang chuyển trang...", 'success');
                    showToast("Đăng ký thành công!", "success");
                    
                    localStorage.setItem("email", emailInput.value);
                    localStorage.setItem("password", passwordInput.value);
                    localStorage.setItem("role", "Thực khách");
                    
                    const transition = document.getElementById("page-transition");
                    if (transition) {
                        transition.classList.remove('pointer-events-none', 'opacity-0');
                        transition.classList.add('opacity-100');
                    }

                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 1000);
                } else if (data.trim() === "Email đã tồn tại!") {
                    emailInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                    setRegisterBubble("Oops, Email này có người dùng mất rồi!", 'error');
                    showToast("Email đã tồn tại", "error");
                } else if (data.trim() === "Sai mã xác thực!") {
                    document.getElementById("code").classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                    setRegisterBubble("Mã xác thực không đúng! Vui lòng kiểm tra lại nha.", 'error');
                    showToast("OTP không đúng", "error");
                } else {
                    setRegisterBubble(data, 'error');
                    showToast(data, "error");
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                btnText.textContent = 'Đăng ký ngay';
                btnLoader.classList.add('hidden');
                setRegisterBubble("Lỗi kết nối rồi nha :(", 'error');
                showToast("Lỗi kết nối máy chủ", "error");
            });
        };

        // Window loaded
        window.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll("input");
            inputs.forEach(input => {
                input.addEventListener("input", function() {
                    this.classList.remove("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                });
            });

            const transition = document.getElementById("page-transition");
            if (transition) {
                setTimeout(() => {
                    transition.classList.remove("opacity-100");
                    transition.classList.add("opacity-0", "pointer-events-none");
                }, 100);
            }
        });
    </script>
</body>
</html>
