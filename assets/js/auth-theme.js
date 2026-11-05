/**
 * Authentication Theme & Interactive Background Animation
 * Gourmet Restaurant - Shared across login, forgot_password, register
 */

(function () {
    // 1. Theme Initialization
    function applySavedTheme() {
        const savedTheme = localStorage.getItem('theme') || localStorage.getItem('admin-theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
    applySavedTheme();

    // 2. Global Theme Toggle Function
    window.toggleAuthTheme = function () {
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        const theme = isDark ? 'dark' : 'light';
        localStorage.setItem('theme', theme);
        localStorage.setItem('admin-theme', theme);

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Update Paimon bubble color if normal
        const bubble = document.getElementById('paimon-bubble');
        if (bubble && (!bubble.style.color || bubble.style.color === 'rgb(51, 51, 51)' || bubble.style.color === 'rgb(30, 41, 59)' || bubble.style.color === 'rgb(248, 250, 252)')) {
            bubble.style.color = isDark ? '#f8fafc' : '#1e293b';
        }
    };

    // 3. Canvas Background Animation
    function initCanvasAnimation() {
        const canvas = document.getElementById('waveCanvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d', { alpha: true });

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        const lightColors = [
            'rgba(251, 146, 60, 0.45)',
            'rgba(245, 158, 11, 0.45)',
            'rgba(244, 63, 94, 0.35)',
            'rgba(251, 191, 36, 0.4)'
        ];

        const darkColors = [
            'rgba(251, 146, 60, 0.6)',
            'rgba(245, 158, 11, 0.65)',
            'rgba(168, 85, 247, 0.45)',
            'rgba(56, 189, 248, 0.4)'
        ];

        const particles = [];
        for (let i = 0; i < 16; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.35,
                vy: (Math.random() - 0.5) * 0.35,
                size: Math.random() * 8 + 3,
                opacity: Math.random() * 0.3 + 0.15,
                lightColor: lightColors[i % lightColors.length],
                darkColor: darkColors[i % darkColors.length]
            });
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            const isDark = document.documentElement.classList.contains('dark');
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);

            if (isDark) {
                gradient.addColorStop(0, '#090d16');
                gradient.addColorStop(0.35, '#0f172a');
                gradient.addColorStop(0.7, '#1e1b4b');
                gradient.addColorStop(1, '#0b0f19');
            } else {
                gradient.addColorStop(0, '#fef8f3');
                gradient.addColorStop(0.4, '#fef3e2');
                gradient.addColorStop(0.7, '#fed9b7');
                gradient.addColorStop(1, '#fec89a');
            }

            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Subtle warm ambient radial light
            const glow1 = ctx.createRadialGradient(
                canvas.width * 0.25,
                canvas.height * 0.25,
                0,
                canvas.width * 0.25,
                canvas.height * 0.25,
                canvas.width * 0.65
            );
            glow1.addColorStop(0, isDark ? 'rgba(245, 158, 11, 0.12)' : 'rgba(251, 146, 60, 0.16)');
            glow1.addColorStop(1, 'rgba(0, 0, 0, 0)');
            ctx.fillStyle = glow1;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Second ambient light at bottom right
            const glow2 = ctx.createRadialGradient(
                canvas.width * 0.8,
                canvas.height * 0.75,
                0,
                canvas.width * 0.8,
                canvas.height * 0.75,
                canvas.width * 0.55
            );
            glow2.addColorStop(0, isDark ? 'rgba(168, 85, 247, 0.08)' : 'rgba(253, 186, 116, 0.15)');
            glow2.addColorStop(1, 'rgba(0, 0, 0, 0)');
            ctx.fillStyle = glow2;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Particles
            particles.forEach(p => {
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < 0 || p.x > canvas.width) p.vx *= -0.8;
                if (p.y < 0 || p.y > canvas.height) p.vy *= -0.8;

                const baseColor = isDark ? p.darkColor : p.lightColor;
                const rgbMatch = baseColor.match(/\d+,\s*\d+,\s*\d+/);
                const rgb = rgbMatch ? rgbMatch[0] : '251, 146, 60';

                const g = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.size * 2);
                g.addColorStop(0, `rgba(${rgb}, ${isDark ? p.opacity + 0.25 : p.opacity + 0.15})`);
                g.addColorStop(1, `rgba(${rgb}, 0)`);

                ctx.fillStyle = g;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size * 1.5, 0, Math.PI * 2);
                ctx.fill();
            });

            requestAnimationFrame(animate);
        }

        animate();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCanvasAnimation);
    } else {
        initCanvasAnimation();
    }
})();

