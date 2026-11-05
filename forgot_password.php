<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu</title>
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
<body class="min-h-screen w-full flex items-center justify-center p-4 transition-colors duration-300">
    <!-- Animated Canvas Background -->
    <canvas id="waveCanvas" class="fixed inset-0 -z-10"></canvas>

    <!-- Floating Theme Toggle Button -->
    <button type="button" onclick="toggleAuthTheme()" class="fixed top-4 right-4 z-50 p-2.5 rounded-full bg-white/80 dark:bg-slate-800/80 backdrop-blur-md border border-orange-100 dark:border-slate-700 text-gray-700 dark:text-amber-400 shadow-lg hover:scale-110 active:scale-95 transition-all" title="Chuyển đổi giao diện Sáng / Tối">
        <i data-lucide="sun" class="w-5 h-5 hidden dark:block"></i>
        <i data-lucide="moon" class="w-5 h-5 block dark:hidden"></i>
    </button>

    <!-- Floating Ornaments -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden -z-5">
        <div class="absolute text-6xl animate-float" style="top: 15%; right: 8%; animation-delay: 0s;">🍔</div>
        <div class="absolute text-5xl animate-float" style="bottom: 20%; left: 10%; animation-delay: 1s;">🍲</div>
        <div class="absolute text-5xl animate-float" style="top: 40%; right: 5%; animation-delay: 2s;">🍱</div>
    </div>

    <!-- Toast Container -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Paimon & Bubble -->
    <div class="bubble" id="paimon-bubble">Paimon sẽ giúp bạn lấy lại Pass nha!</div>
    <img src="assets/img/paimon_sticker.png" class="paimon" alt="Paimon">

    <!-- Auth Card -->
    <div class="relative z-10 w-full max-w-sm my-8">
        <div class="glass-card rounded-2xl p-8 transition-all duration-500 hover:shadow-2xl">
            <!-- Header -->
            <div class="text-center mb-6 flex flex-col items-center">
                <a href="dashboard.php" class="block w-24 h-24 bg-white dark:bg-slate-800 p-1 rounded-full shadow-lg mb-4 flex items-center justify-center border-2 border-orange-100 dark:border-slate-700 hover:scale-105 active:scale-95 transition-all group">
                    <img src="assets/img/hero/logo.png" alt="Logo" class="w-full h-full object-contain rounded-full group-hover:rotate-12 transition-transform duration-300">
                </a>
                <h1 class="text-3xl font-bold text-gradient mb-2">Đừng lo lắng!</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 font-light">Chúng tôi sẽ giúp bạn lấy lại mật khẩu</p>
            </div>

            <form id="form" class="space-y-4">
                
                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email của bạn</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100" 
                               placeholder="Nhập email đã đăng ký" required autofocus>
                    </div>
                </div>

                <!-- OTP Input -->
                <div class="space-y-1.5">
                    <label for="code" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Mã xác thực (OTP)</label>
                    <div class="flex items-center gap-2">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                                <i data-lucide="key" class="w-4 h-4"></i>
                            </div>
                            <input type="text" id="code" name="code" 
                                   class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-orange-100 dark:focus:ring-amber-500/20 focus:border-orange-500 dark:focus:border-amber-400 transition-all outline-none text-sm placeholder:text-gray-400 dark:placeholder:text-gray-500 bg-white dark:bg-slate-800/90 text-gray-800 dark:text-gray-100 font-mono tracking-wider" 
                                   placeholder="Mã OTP 6 số" required>
                        </div>
                        <button type="button" id="btnSendCode" onclick="sendCode()" class="bg-amber-100 dark:bg-amber-500/20 text-amber-800 dark:text-amber-300 hover:bg-amber-200 dark:hover:bg-amber-500/30 font-semibold px-4 py-2.5 rounded-xl transition-all shadow-sm active:scale-95 text-sm whitespace-nowrap border border-amber-300 dark:border-amber-500/30 flex items-center gap-1.5">
                            <i data-lucide="send" class="w-3.5 h-3.5"></i>
                            <span>Gửi mã</span>
                        </button>
                    </div>
                </div>

                <!-- New Password Input -->
                <div class="space-y-1.5">
                    <label for="new_password" class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Mật khẩu mới</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 dark:text-gray-500">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="new_password" name="new_password" 
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
                    <span id="btnText">Khôi phục mật khẩu</span>
                    <div id="btnLoader" class="hidden w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                </button>

                <div class="text-center space-y-2 mt-4">
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                        Nhớ ra mật khẩu rồi? 
                        <a href="login.php" onclick="goToLogin(event)" class="font-bold text-amber-600 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 transition-colors cursor-pointer">Trở lại Đăng nhập</a>
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
        // Lucide Icons initialization
        lucide.createIcons();

        const bubble = document.getElementById('paimon-bubble');

        function setBubble(text, type = 'normal') {
            if (!bubble) return;
            const isDark = document.documentElement.classList.contains('dark');
            bubble.innerText = text;
            if (type === 'error') {
                bubble.style.color = '#ef4444';
            } else if (type === 'success') {
                bubble.style.color = '#10b981';
            } else if (type === 'warning') {
                bubble.style.color = '#f59e0b';
            } else {
                bubble.style.color = isDark ? '#f8fafc' : '#1e293b';
            }
        }

        // Toggle Password
        const passwordInput = document.getElementById('new_password');
        const toggleBtn = document.getElementById('togglePassword');
        toggleBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            toggleBtn.innerHTML = isPassword ? '<i data-lucide="eye-off" class="w-4 h-4"></i>' : '<i data-lucide="eye" class="w-4 h-4"></i>';
            lucide.createIcons();
        });

        // Real-time Validate
        const passwordError = document.getElementById('passwordError');
        passwordInput.addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                this.classList.add('border-red-400', 'bg-red-50', 'dark:bg-red-950/20');
                if (passwordError) passwordError.classList.remove('hidden');
                setBubble("Mật khẩu mới phải từ 6 ký tự đó nha!", 'error');
            } else {
                this.classList.remove('border-red-400', 'bg-red-50', 'dark:bg-red-950/20');
                if (passwordError) passwordError.classList.add('hidden');
                if (this.value.length >= 6) {
                    setBubble("Tuyệt, pass này nhìn vững chắc phết!", 'normal');
                }
            }
        });

        // ===== GỬI MÃ OTP =====
        function sendCode() {
            let emailInput = document.getElementById("email");
            let email = emailInput.value.trim();
            
            if (!email) {
                emailInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                setBubble("Bạn phải nhập email trước đã chứ!", 'error');
                return;
            }

            emailInput.classList.remove("border-red-400", "bg-red-50", "dark:bg-red-950/20");
            setBubble("Đang gửi email... bạn chờ xíu nha.", 'warning');

            const btnSend = document.getElementById('btnSendCode');
            if (btnSend) {
                btnSend.disabled = true;
                btnSend.classList.add('opacity-70');
            }

            let formData = new FormData();
            formData.append("email", email);

            fetch("src/api/email/send_otp.php", {
                method: "POST",
                body: formData
            })
            .then(res => {
                if (!res.ok) throw new Error("File backend không tồn tại!");
                return res.text();
            })
            .then(data => {
                if (btnSend) {
                    btnSend.disabled = false;
                    btnSend.classList.remove('opacity-70');
                }
                setBubble(data, 'success'); 
                const otpMatch = data.match(/\b\d{6}\b/);
                if (otpMatch && otpMatch[0]) {
                    const codeInput = document.getElementById('code');
                    if (codeInput) codeInput.value = otpMatch[0];
                }
            })
            .catch(error => {
                if (btnSend) {
                    btnSend.disabled = false;
                    btnSend.classList.remove('opacity-70');
                }
                console.error("Error:", error);
                setBubble("Có lỗi xảy ra khi gửi mã rồi :(", 'error');
            });
        }

        // ===== SUBMIT FORM ĐỔI MẬT KHẨU =====
        document.getElementById("form").onsubmit = function(e) {
            e.preventDefault();

            if (passwordInput.value.length < 6) {
                setBubble("Mật khẩu phải từ 6 ký tự trở lên nha!", 'error');
                passwordInput.classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                if (passwordError) passwordError.classList.remove('hidden');
                return;
            }

            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');
            const submitBtn = document.getElementById('submitBtn');

            submitBtn.disabled = true;
            btnText.textContent = 'Đang xử lý...';
            btnLoader.classList.remove('hidden');

            let formData = new FormData(this);
            setBubble("Đang xử lý đổi mật khẩu... chờ xí!", 'warning');

            fetch("src/api/reset_password_handler.php", {
                method: "POST",
                body: formData
            })
            .then(res => {
                if (!res.ok) throw new Error("File backend không tồn tại!");
                return res.text();
            })
            .then(data => {
                if (data.trim() === "Đổi mật khẩu thành công!") {
                    setBubble("Tuyệt vời! Đã đổi pass mới, đang quay về trang Đăng nhập...", 'success');
                    
                    // Xóa session storage email cũ của form đăng ký để tránh xung đột
                    sessionStorage.removeItem("dangky_input_email");
                    
                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 1000);
                } else if (data.trim() === "Sai mã xác thực!" || data.trim().includes("hết hạn")) {
                    document.getElementById("code").classList.add("border-red-400", "bg-red-50", "dark:bg-red-950/20");
                    setBubble(data, 'error'); 
                    
                    submitBtn.disabled = false;
                    btnText.textContent = 'Khôi phục mật khẩu';
                    btnLoader.classList.add('hidden');
                } else {
                    setBubble(data, 'error');
                    
                    submitBtn.disabled = false;
                    btnText.textContent = 'Khôi phục mật khẩu';
                    btnLoader.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error("Error:", error);
                setBubble("Lỗi hệ thống hoặc kết nối rồi nha :(", 'error');
                
                submitBtn.disabled = false;
                btnText.textContent = 'Khôi phục mật khẩu';
                btnLoader.classList.add('hidden');
            });
        }

        // ===== CHUYỂN TRANG =====
        function goToLogin(e) {
            e.preventDefault();
            const transition = document.getElementById("page-transition");
            if (transition) {
                transition.classList.remove('pointer-events-none', 'opacity-0');
                transition.classList.add('opacity-100');
            }

            setTimeout(() => {
                window.location.href = "login.php";
            }, 400);
        }

        // ===== HIỆU ỨNG TẢI TRANG =====
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

