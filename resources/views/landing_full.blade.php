<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow — Orchestrate Workflows Beautifully</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/all.min.css') }}">
    <script src="{{ asset('assets/vendor/fontawesome/all.min.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        headline: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        // Diubah ke Slate / Premium Dark-Blue yang lebih terang & kaya warna (Tidak terlalu pekat)
                        "background": "#0f172a", // Slate 900 (Lebih terang dari sebelumnya)
                        "surface": "#1e293b", // Slate 800 (Kontras lebih hidup)
                        "surface-container-lowest": "#0b0f19",
                        "surface-container-low": "#1e293b",
                        "surface-container-high": "#334155", // Slate 700
                        "surface-container-highest": "#475569", // Slate 600
                        "surface-bright": "#3b4f6a",
                        "surface-dim": "#1e293b",

                        // Warna Aksen Utama yang Lebih Vibrant / Pop Out
                        "primary": "#6366f1", // Indigo 500
                        "primary-container": "#4f46e5", // Indigo 650
                        "on-primary": "#ffffff",
                        "on-primary-container": "#e0e7ff",

                        "secondary": "#10b981", // Emerald 500
                        "secondary-container": "#059669", // Emerald 600
                        "on-secondary": "#ffffff",
                        "on-secondary-container": "#ecfdf5",

                        "tertiary": "#f97316", // Orange 500
                        "on-tertiary": "#ffffff",

                        // Warna Teks yang Diperjelas untuk Aksesibilitas Tinggi
                        "on-background": "#f8fafc", // Putih Slate Sangat Terang
                        "text-white": "#ffffff",
                        "on-surface": "#f1f5f9", // Abu-abu Terang Terbaca
                        "on-surface-variant": "#cbd5e1", // Slate 300 (Sangat kontras, anti-redup)
                        "outline": "#64748b", // Slate 500
                        "outline-variant": "rgba(100, 116, 139, 0.3)",

                        "error": "#ef4444",
                        "error-container": "#991b1b",
                        "on-error-container": "#fee2e2"
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem",
                        "lg": "0.75rem",
                        "xl": "1.25rem",
                        "2xl": "2rem",
                        "full": "9999px"
                    },
                    animation: {
                        'pulse-slow': 'pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 20s linear infinite',
                    }
                },
            },
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-headline {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
            border: 2px solid #0f172a;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }

        .glass-premium {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glow-overlay::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at var(--x, 50%) var(--y, 50%), rgba(99, 102, 241, 0.15) 0%, transparent 50%);
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-background text-on-background antialiased leading-relaxed overflow-x-hidden" x-data="{ mobileMenu: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false">

    <div class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] bg-primary/20 rounded-full blur-[160px] pointer-events-none animation-pulse-slow"></div>
    <div class="absolute top-[20%] right-[-10%] w-[45vw] h-[45vw] bg-secondary/15 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute top-[60%] left-[20%] w-[60vw] h-[60vw] bg-tertiary/10 rounded-full blur-[180px] pointer-events-none animation-pulse-slow"></div>

    <nav class="fixed inset-x-0 top-0 z-50 transition-all duration-300 border-b" :class="scrolled ? 'glass-premium py-3 shadow-lg shadow-background/50' : 'bg-transparent py-5 border-transparent'">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-9 h-9 rounded-xl bg-linear-to-tr from-primary to-secondary flex items-center justify-center shadow-md shadow-primary/30 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-layer-group text-white text-sm"></i>
                    </div>
                    <span class="text-white font-headline font-extrabold text-xl tracking-tight bg-linear-to-r from-white via-slate-200 to-slate-400 bg-clip-text">Task Flow</span>
                </a>
                <div class="hidden lg:flex items-center gap-8 text-sm font-semibold text-on-surface-variant">
                    <a href="#features" class="hover:text-primary transition-colors relative group py-2">
                        Features
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#projects" class="hover:text-primary transition-colors relative group py-2">
                        Projects
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#usecases" class="hover:text-primary transition-colors relative group py-2">
                        Solutions
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#pricing" class="hover:text-primary transition-colors relative group py-2">
                        Pricing
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#faq" class="hover:text-primary transition-colors relative group py-2">
                        FAQ
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex items-center gap-5">
                <a href="{{ route('login') }}" class="text-sm font-bold text-on-surface-variant hover:text-white transition-colors">Sign in</a>
                <a href="{{ route('register') }}"
                    class="px-5 py-2.5 bg-secondary hover:bg-secondary-container text-white font-bold rounded-xl text-sm transition-all hover:shadow-lg hover:shadow-secondary/30 active:scale-98">Get
                    Started Free</a>
            </div>

            <button @click="mobileMenu = !mobileMenu" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-surface-container-high border border-outline-variant text-white">
                <i class="fa-solid transition-transform duration-300" :class="mobileMenu ? 'fa-xmark rotate-90' : 'fa-bars'"></i>
            </button>
        </div>

        <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
            class="absolute top-full inset-x-0 bg-surface border-b border-outline-variant p-6 shadow-xl lg:hidden">
            <div class="flex flex-col gap-4">
                <a href="#features" @click="mobileMenu = false" class="py-2 text-on-surface-variant font-semibold hover:text-white">Features</a>
                <a href="#projects" @click="mobileMenu = false" class="py-2 text-on-surface-variant font-semibold hover:text-white">Projects</a>
                <a href="#usecases" @click="mobileMenu = false" class="py-2 text-on-surface-variant font-semibold hover:text-white">Solutions</a>
                <a href="#pricing" @click="mobileMenu = false" class="py-2 text-on-surface-variant font-semibold hover:text-white">Pricing</a>
                <a href="#faq" @click="mobileMenu = false" class="py-2 text-on-surface-variant font-semibold hover:text-white">FAQ</a>
                <hr class="border-outline-variant my-2">
                <a href="{{ route('login') }}" class="py-2 text-center text-on-surface-variant font-bold">Sign in</a>
                <a href="{{ route('register') }}" class="w-full py-3 bg-secondary text-white text-center font-bold rounded-xl shadow-lg">Get Started Free</a>
            </div>
        </div>
    </nav>

    <main class="relative z-10">

        <section id="hero" class="relative pt-32 pb-20 md:pt-40 md:pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                <div class="space-y-8 lg:col-span-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/30 text-xs font-bold text-primary">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                        v2.0 Next-Gen Kanban Framework
                    </div>

                    <h1 class="font-headline text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1]">
                        Manage tasks, workflows & teams — with <span class="bg-linear-to-r from-primary via-secondary to-tertiary bg-clip-text text-transparent">calm control.</span>
                    </h1>

                    <p class="text-on-surface-variant text-base sm:text-lg max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed">
                        Task Flow adalah sistem manajemen asinkronus bergaya Kanban premium untuk tim berkinerja tinggi. Desain kolom kustom, pantau prioritas eksklusif, dan percepat siklus rilis
                        produk Anda.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('register') }}"
                            class="w-full sm:w-auto px-8 py-4 bg-linear-to-r from-primary to-primary-container text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:brightness-110 hover:scale-[1.02] active:scale-98 transition-all flex items-center justify-center gap-3 group">
                            Create Account
                            <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#features"
                            class="w-full sm:w-auto px-8 py-4 border border-outline bg-surface/40 hover:bg-surface text-white font-semibold rounded-xl transition-all flex items-center justify-center">
                            Explore Features
                        </a>
                    </div>

                    <div class="pt-8 grid grid-cols-3 gap-4 max-w-lg mx-auto lg:mx-0">
                        <div class="p-4 bg-surface border border-outline-variant rounded-xl">
                            <div class="text-xs text-on-surface-variant font-semibold tracking-wide uppercase">Active Users</div>
                            <div class="font-headline font-bold text-white text-xl sm:text-2xl mt-1">1,248+</div>
                        </div>
                        <div class="p-4 bg-surface border border-outline-variant rounded-xl">
                            <div class="text-xs text-on-surface-variant font-semibold tracking-wide uppercase">Projects</div>
                            <div class="font-headline font-bold text-white text-xl sm:text-2xl mt-1">428</div>
                        </div>
                        <div class="p-4 bg-surface border border-outline-variant rounded-xl">
                            <div class="text-xs text-on-surface-variant font-semibold tracking-wide uppercase">Monthly Ops</div>
                            <div class="font-headline font-bold text-white text-xl sm:text-2xl mt-1">8.4k+</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 relative flex justify-center items-center">
                    <div class="absolute inset-0 bg-linear-to-tr from-primary/20 to-secondary/20 rounded-full blur-2xl opacity-70 pointer-events-none"></div>
                    <div class="w-full rounded-2xl border border-outline bg-surface p-3 shadow-2xl relative group overflow-hidden">
                        <div class="flex items-center justify-between px-3 pb-3 border-b border-outline-variant mb-3">
                            <div class="flex items-center gap-1.5">
                                <span class="w-3 h-3 rounded-full bg-red-500 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-yellow-500 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-green-500 inline-block"></span>
                            </div>
                            <div class="text-[11px] font-mono text-on-surface-variant/80 select-none">https://taskflow.io/dashboard</div>
                        </div>
                        <img src="{{ asset('assets/images/hero-screenshot.png') }}" alt="App screenshot"
                            class="w-full h-72 sm:h-96 object-cover rounded-xl group-hover:scale-[1.01] transition-transform duration-700">
                    </div>

                    <div class="absolute -bottom-10 -left-6 hidden sm:flex flex-col gap-3 z-20">
                        <div class="glass-premium p-4 rounded-xl shadow-xl w-64 transform -rotate-2 hover:rotate-0 transition-transform duration-300">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-secondary/20 flex items-center justify-center text-secondary">
                                    <i class="fa-solid fa-bolt text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-white font-bold text-sm">Quick Add Mode</div>
                                    <div class="text-on-surface-variant text-[11px] font-medium">Inject tasks to board instantly.</div>
                                </div>
                            </div>
                        </div>
                        <div class="glass-premium p-4 rounded-xl shadow-xl w-64 transform rotate-1 hover:rotate-0 transition-transform duration-300">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                                    <i class="fa-solid fa-clock text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-white font-bold text-sm">Smart Sections</div>
                                    <div class="text-on-surface-variant text-[11px] font-medium">Keep highlighted items for 7 days.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="py-10 border-y border-outline-variant bg-surface/50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-xs font-bold tracking-widest text-on-surface-variant uppercase mb-6">Empowering global digital workflows</p>
                <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                    <span class="font-headline font-bold text-xl tracking-wider text-white"><i class="fa-brands fa-stripe me-2"></i>STRIPE</span>
                    <span class="font-headline font-bold text-xl tracking-wider text-white"><i class="fa-brands fa-airbnb me-2"></i>AIRBNB</span>
                    <span class="font-headline font-bold text-xl tracking-wider text-white"><i class="fa-brands fa-uber me-2"></i>UBER</span>
                    <span class="font-headline font-bold text-xl tracking-wider text-white"><i class="fa-brands fa-slack me-2"></i>SLACK</span>
                    <span class="font-headline font-bold text-xl tracking-wider text-white"><i class="fa-brands fa-figma me-2"></i>FIGMA</span>
                </div>
            </div>
        </section>

        <section id="features" class="py-24 sm:py-32">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
                    <div class="text-xs font-bold text-primary tracking-widest uppercase">System Framework</div>
                    <h2 class="font-headline text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight"> Engineered for flawless execution. </h2>
                    <p class="text-on-surface-variant text-base sm:text-lg font-medium"> Arsitektur tangguh berbasis arsitektur Kanban modern, template workflow otomatis, dan integrasi visual
                        intuitif. </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                    <div
                        class="p-8 bg-surface border border-outline rounded-2xl shadow-md hover:border-primary/60 transition-all duration-300 md:col-span-7 flex flex-col justify-between group overflow-hidden relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-xl group-hover:bg-primary/20 transition-colors"></div>
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-white font-bold shadow-md shadow-primary/30 mb-6">
                                <i class="fa-solid fa-table-columns text-lg"></i>
                            </div>
                            <h3 class="font-headline font-bold text-xl text-white mb-2">High-Fidelity Kanban Board</h3>
                            <p class="text-on-surface-variant text-sm font-medium max-w-md leading-relaxed"> Pindahkan kartu tugas melintasi jalur jalur siklus kerja secara asinkronus menggunakan
                                drag-and-drop mikro yang presisi dan instan. </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-outline-variant flex items-center gap-2 text-xs font-bold text-primary group-hover:text-white transition-colors">
                            Learn technical details <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </div>
                    </div>

                    <div
                        class="p-8 bg-surface border border-outline rounded-2xl shadow-md hover:border-amber-500/60 transition-all duration-300 md:col-span-5 flex flex-col justify-between group overflow-hidden relative">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-amber-500 flex items-center justify-center text-white font-bold shadow-md shadow-amber-500/30 mb-6">
                                <i class="fa-solid fa-route text-lg"></i>
                            </div>
                            <h3 class="font-headline font-bold text-xl text-white mb-2">Flexible Workflows</h3>
                            <p class="text-on-surface-variant text-sm font-medium leading-relaxed"> Definisikan langkah-langkah berulang dan simpan sebagai cetak biru untuk menghemat waktu inisiasi
                                proyek baru. </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-outline-variant flex items-center gap-2 text-xs font-bold text-amber-500 group-hover:text-white transition-colors">
                            Explore automated states <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </div>
                    </div>

                    <div
                        class="p-8 bg-surface border border-outline rounded-2xl shadow-md hover:border-sky-500/60 transition-all duration-300 md:col-span-5 flex flex-col justify-between group overflow-hidden relative">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-sky-500 flex items-center justify-center text-white font-bold shadow-md shadow-sky-500/30 mb-6">
                                <i class="fa-solid fa-thumbtack text-lg"></i>
                            </div>
                            <h3 class="font-headline font-bold text-xl text-white mb-2">Smart Promotion Sections</h3>
                            <p class="text-on-surface-variant text-sm font-medium leading-relaxed"> Sematkan (pin) tugas-tugas kritis Anda langsung ke bagian atas dashboard global dengan sistem
                                validasi kedaluwarsa 7 hari otomatis. </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-outline-variant flex items-center gap-2 text-xs font-bold text-sky-500 group-hover:text-white transition-colors">
                            See how it works <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </div>
                    </div>

                    <div
                        class="p-8 bg-surface border border-outline rounded-2xl shadow-md hover:border-secondary/60 transition-all duration-300 md:col-span-7 flex flex-col justify-between group overflow-hidden relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-secondary/10 rounded-full blur-xl group-hover:bg-secondary/20 transition-colors"></div>
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-secondary flex items-center justify-center text-white font-bold shadow-md shadow-secondary/30 mb-6">
                                <i class="fa-solid fa-chart-line text-lg"></i>
                            </div>
                            <h3 class="font-headline font-bold text-xl text-white mb-2">Real-Time Team Performance</h3>
                            <p class="text-on-surface-variant text-sm font-medium max-w-md leading-relaxed"> Analisis produktivitas anggota tim secara langsung melalui grafik kecepatan pengerjaan
                                (*velocity charts*) yang terintegrasi. </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-outline-variant flex items-center gap-2 text-xs font-bold text-secondary group-hover:text-white transition-colors">
                            View analytical metrics <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="projects" class="py-24 bg-surface/40 border-y border-outline-variant relative">
            <div class="max-w-7xl mx-auto px-6">

                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                    <div>
                        <div class="text-xs font-bold text-secondary tracking-widest uppercase mb-2">Dynamic Workspace</div>
                        <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Interactive Board Sandbox</h2>
                        <p class="text-on-surface-variant text-sm mt-1 font-medium">Simulasi real-time struktur pembagian kolom tugas di dalam sistem Anda.</p>
                    </div>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-white transition-colors group self-start md:self-auto">
                        Manage Projects Framework
                        <i class="fa-solid fa-arrow-trend-up group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $sampleColors = ['#ef4444', '#f97316', '#ffb27b', '#3b82f6', '#10b981', '#8b5cf6', '#059669', '#6366f1'];
                        $projectNames = [
                            'E-Commerce Core',
                            'Mobile App API',
                            'Marketing Campaign',
                            'Infrastructure Scale',
                            'Design System System',
                            'Analytics Pipeline',
                            'Customer Portal CRM',
                            'Security Audit Fix',
                        ];
                    @endphp
                    @for ($i = 0; $i < 8; $i++)
                        <div class="p-5 bg-surface border border-outline rounded-2xl hover:bg-slate-700/60 transition-all group shadow-md">
                            <div class="flex items-start justify-between gap-4">
                                <div class="truncate">
                                    <h3 class="font-headline font-bold text-white text-base group-hover:text-primary transition-colors truncate">{{ $projectNames[$i] }}</h3>
                                    <div class="text-on-surface-variant text-xs mt-1 font-semibold flex items-center gap-1.5">
                                        <i class="fa-solid fa-list-check text-[10px]"></i>
                                        {{ rand(3, 26) }} tasks active
                                    </div>
                                </div>
                                <div class="w-8 h-8 rounded-xl shrink-0 shadow-inner group-hover:scale-105 transition-transform" style="background: {{ $sampleColors[$i % count($sampleColors)] }}">
                                </div>
                            </div>

                            <div class="mt-5 space-y-2">
                                <div class="flex items-center justify-between p-2 bg-background/80 rounded-xl text-xs font-semibold text-on-surface-variant">
                                    <span class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> To Do
                                    </span>
                                    <span class="text-[10px] px-1.5 py-0.5 bg-surface-container-high rounded text-white font-bold">{{ rand(1, 5) }}</span>
                                </div>
                                <div class="flex items-center justify-between p-2 bg-background/80 rounded-xl text-xs font-semibold text-on-surface-variant">
                                    <span class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> In Progress
                                    </span>
                                    <span class="text-[10px] px-1.5 py-0.5 bg-surface-container-high rounded text-white font-bold">{{ rand(1, 4) }}</span>
                                </div>
                                <div class="flex items-center justify-between p-2 bg-background/80 rounded-xl text-xs font-semibold text-on-surface-variant">
                                    <span class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Review
                                    </span>
                                    <span class="text-[10px] px-1.5 py-0.5 bg-surface-container-high rounded text-white font-bold">{{ rand(0, 3) }}</span>
                                </div>
                                <div class="flex items-center justify-between p-2 bg-background/80 rounded-xl text-xs font-semibold text-on-surface-variant">
                                    <span class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Done
                                    </span>
                                    <span class="text-[10px] px-1.5 py-0.5 bg-surface-container-high rounded text-white font-bold"><i
                                            class="fa-solid fa-check text-emerald-500 text-[9px]"></i></span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </section>

        <section id="integrations" class="py-24">
            <div class="max-w-7xl mx-auto px-6">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-4 space-y-4">
                        <div class="text-xs font-bold text-tertiary tracking-widest uppercase">Connected Ecosystem</div>
                        <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Native Integration Hub.</h2>
                        <p class="text-on-surface-variant text-sm font-medium leading-relaxed">
                            Hubungkan siklus board Kanban dengan tumpukan teknologi developer yang sudah Anda gunakan setiap hari tanpa konfigurasi rumit.
                        </p>
                        <div class="pt-2">
                            <a href="#" class="text-sm font-bold text-tertiary hover:text-white transition-colors flex items-center gap-2 group">
                                View all 40+ connectors <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @php
                            $ints = [
                                ['name' => 'Slack', 'icon' => 'fa-slack', 'color' => 'text-[#4A154B]'],
                                ['name' => 'GitHub', 'icon' => 'fa-github', 'color' => 'text-white'],
                                ['name' => 'Google Cal', 'icon' => 'fa-google', 'color' => 'text-[#4285F4]'],
                                ['name' => 'Figma', 'icon' => 'fa-figma', 'color' => 'text-[#F24E1E]'],
                                ['name' => 'Notion', 'icon' => 'fa-file-lines', 'color' => 'text-white'],
                                ['name' => 'Discord', 'icon' => 'fa-discord', 'color' => 'text-[#5865F2]'],
                            ];
                        @endphp
                        @foreach ($ints as $it)
                            <div class="p-4 bg-surface border border-outline rounded-2xl flex items-center gap-4 shadow-md hover:bg-slate-700/60 transition-colors group">
                                <div class="w-11 h-11 rounded-xl bg-background flex items-center justify-center text-xl shrink-0 group-hover:scale-105 transition-transform {{ $it['color'] }}">
                                    <i class="fa-brands {{ $it['icon'] }}"></i>
                                </div>
                                <div class="truncate">
                                    <div class="font-bold text-white text-sm truncate">{{ $it['name'] }}</div>
                                    <div class="text-on-surface-variant font-semibold text-[11px] mt-0.5">Instant Webhook</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        <section id="testimonials" class="py-24 bg-surface/50 border-y border-outline-variant">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <div class="text-xs font-bold text-primary tracking-widest uppercase">Social Validation</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Loved by High-Velocity Teams</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $companies = ['Stripe Integration Lead', 'Airbnb Product VP', 'Figma Core Architect'];
                        $names = ['Sarah Jenkins', 'Marcus Vance', 'Elena Rostova'];
                        $quotes = [
                            'Task Flow merevolusi manajemen sprint mingguan kami. Fitur Smart Sections sangat membantu tim fokus menyelesaikan item blocking.',
                            'UI Kustomisasi kolom yang sangat bersih dan performa sinkronisasi database asinkronus yang luar biasa cepat.',
                            'Manajemen taktis terbaik untuk tim kecil yang bergerak gesit. Menghilangkan overhead rapat status harian.',
                        ];
                    @endphp
                    @for ($t = 0; $t < 3; $t++)
                        <div class="p-6 bg-surface border border-outline rounded-2xl flex flex-col justify-between shadow-md relative">
                            <span class="absolute top-6 right-6 text-outline-variant text-5xl font-serif select-none pointer-events-none">“</span>
                            <div>
                                <div class="flex items-center gap-3.5 mb-6">
                                    <div class="w-11 h-11 rounded-full bg-linear-to-tr from-primary to-primary-container flex items-center justify-center text-white font-bold shadow-md">
                                        {{ substr($names[$t], 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-white text-sm">{{ $names[$t] }}</div>
                                        <div class="text-on-surface-variant font-semibold text-xs mt-0.5">{{ $companies[$t] }}</div>
                                    </div>
                                </div>
                                <p class="text-on-surface-variant text-sm font-medium leading-relaxed italic">
                                    "{{ $quotes[$t] }}"
                                </p>
                            </div>
                            <div class="mt-6 flex items-center gap-1 text-amber-400 text-xs">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </section>

        <section id="usecases" class="py-24">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <div class="text-xs font-bold text-secondary tracking-widest uppercase">Tailored Experiences</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Versatile Use Cases Framework</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 rounded-2xl bg-surface border border-outline hover:border-primary/50 transition-all shadow-md group">
                        <div class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center text-primary mb-4 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-code text-sm"></i>
                        </div>
                        <h3 class="font-headline font-bold text-lg text-white">Engineering Sprints</h3>
                        <p class="text-on-surface-variant text-sm font-medium mt-2 leading-relaxed"> Kelola siklus rilis fitur, pelacakan bug, peninjauan kode (QA), dan otomatisasi webhook CI/CD
                            dalam satu ruang visual tunggal. </p>
                    </div>

                    <div class="p-6 rounded-2xl bg-surface border border-outline hover:border-amber-500/50 transition-all shadow-md group">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center text-amber-500 mb-4 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-bezier-curve text-sm"></i>
                        </div>
                        <h3 class="font-headline font-bold text-lg text-white">Creative Agencies</h3>
                        <p class="text-on-surface-variant text-sm font-medium mt-2 leading-relaxed"> Pantau aset desain, peninjauan umpan balik dari klien eksternal, dan tenggat waktu pengiriman
                            *milestone* secara simultan. </p>
                    </div>

                    <div class="p-6 rounded-2xl bg-surface border border-outline hover:border-sky-500/50 transition-all shadow-md group">
                        <div class="w-10 h-10 rounded-xl bg-sky-500/20 flex items-center justify-center text-sky-500 mb-4 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-briefcase text-sm"></i>
                        </div>
                        <h3 class="font-headline font-bold text-lg text-white">Operations Management</h3>
                        <p class="text-on-surface-variant text-sm font-medium mt-2 leading-relaxed"> Pertahankan visibilitas penuh alur administratif internal perusahaan, proses orientasi karyawan,
                            dan pemantauan dokumen berkala. </p>
                    </div>
                </div>

            </div>
        </section>

        <section id="roadmap" class="py-24 bg-surface/40 border-y border-outline-variant">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <div class="text-xs font-bold text-tertiary tracking-widest uppercase">Future Delivery</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Strategic System Roadmap</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <div class="hidden md:block absolute top-10 left-16 right-16 h-px bg-linear-to-r from-secondary to-outline-variant z-0"></div>

                    <div class="p-5 bg-surface border border-outline rounded-2xl relative z-10 space-y-4 shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-full bg-secondary/10 border border-secondary/30 text-[10px] font-bold text-secondary">SHIPPED Q2</span>
                            <i class="fa-solid fa-circle-check text-secondary text-sm"></i>
                        </div>
                        <h3 class="font-headline font-bold text-base text-white">Kanban Core & Smart Sections</h3>
                        <p class="text-on-surface-variant text-xs font-semibold leading-relaxed"> Peluncuran mesin inti *drag-and-drop*, integrasi parameter database kustom, dan sistem promosi dasbor
                            7 hari. </p>
                    </div>

                    <div class="p-5 bg-surface border border-outline rounded-2xl relative z-10 space-y-4 shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-full bg-primary/10 border border-primary/30 text-[10px] font-bold text-primary">DEVELOPING NOW</span>
                            <div class="w-2 h-2 rounded-full bg-primary animate-ping"></div>
                        </div>
                        <h3 class="font-headline font-bold text-base text-white">Advanced Graph & Automation</h3>
                        <p class="text-on-surface-variant text-xs font-semibold leading-relaxed"> Integrasi otomatisasi status berbasis pemicu logika (*triggers*), analitik mendalam performa tim, dan
                            peran izin granular. </p>
                    </div>

                    <div class="p-5 bg-surface border border-outline rounded-2xl relative z-10 space-y-4 shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 rounded-full bg-slate-700 border border-outline-variant text-[10px] font-bold text-on-surface-variant">PLANNED Q4</span>
                            <i class="fa-solid fa-hourglass text-outline text-xs"></i>
                        </div>
                        <h3 class="font-headline font-bold text-base text-white">Enterprise Architecture & SSO</h3>
                        <p class="text-on-surface-variant text-xs font-semibold leading-relaxed"> Protokol keamanan Single Sign-On (SSO), enkripsi tingkat lanjut, audit log komparatif, dan ekosistem
                            aplikasi seluler mandiri. </p>
                    </div>
                </div>

            </div>
        </section>

        <section id="pricing" class="py-24 sm:py-32">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-2xl mx-auto mb-20 space-y-3">
                    <div class="text-xs font-bold text-primary tracking-widest uppercase">Transparent Plans</div>
                    <h2 class="font-headline text-3xl sm:text-4xl font-extrabold text-white">Predictable Investment Frame</h2>
                    <p class="text-on-surface-variant text-sm font-semibold">Pilih skala paket yang sesuai dengan akselerasi pertumbuhan tim Anda.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

                    <div class="p-8 bg-surface border border-outline rounded-2xl flex flex-col justify-between space-y-8 shadow-md">
                        <div class="space-y-4">
                            <div class="font-headline font-bold text-on-surface-variant uppercase tracking-wider text-xs">Starter Lifecycle</div>
                            <div class="flex items-baseline gap-1">
                                <span class="font-headline font-extrabold text-4xl text-white">Free</span>
                            </div>
                            <p class="text-on-surface-variant text-xs font-semibold">Esensial dasar untuk manajemen tugas personal.</p>
                            <hr class="border-outline-variant">
                            <ul class="text-on-surface-variant text-xs font-semibold space-y-3.5">
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> Basic Kanban Engine</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> Max 3 Active Projects</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> 7-Days Smart Promo Section</li>
                                <li class="flex items-center gap-2.5 text-slate-500"><i class="fa-solid fa-xmark"></i> Native Slack Webhook</li>
                            </ul>
                        </div>
                        <a href="{{ route('register') }}"
                            class="w-full py-3 border border-outline hover:border-primary text-center text-xs font-bold text-white bg-background rounded-xl transition-colors">Start Free Lifecycle</a>
                    </div>

                    <div class="p-8 bg-surface border-2 border-secondary rounded-2xl flex flex-col justify-between space-y-8 relative shadow-xl shadow-secondary/10">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-secondary text-[10px] font-extrabold text-white tracking-wider uppercase shadow-md">
                            Most Requested Plan</div>
                        <div class="space-y-4">
                            <div class="font-headline font-bold text-secondary uppercase tracking-wider text-xs">Team High-Velocity</div>
                            <div class="flex items-baseline gap-1">
                                <span class="font-headline font-extrabold text-4xl text-white">$8</span>
                                <span class="text-on-surface-variant text-xs">/ user / mo</span>
                            </div>
                            <p class="text-on-surface-variant text-xs font-semibold">Skala kolaborasi mutakhir tanpa batas pengerjaan.</p>
                            <hr class="border-outline-variant">
                            <ul class="text-on-surface-variant text-xs font-semibold space-y-3.5">
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-secondary"></i> Unlimited Workspace Projects</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-secondary"></i> Automation Blueprints & Workflows</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-secondary"></i> Full Core Integrations Ecosystem</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-secondary"></i> Priority Support Infrastructure</li>
                            </ul>
                        </div>
                        <a href="{{ route('register') }}"
                            class="w-full py-3.5 bg-secondary hover:bg-secondary-container text-white text-center text-xs font-bold rounded-xl shadow-lg transition-all active:scale-98">Deploy Team
                            Workspace</a>
                    </div>

                    <div class="p-8 bg-surface border border-outline rounded-2xl flex flex-col justify-between space-y-8 shadow-md">
                        <div class="space-y-4">
                            <div class="font-headline font-bold text-on-surface-variant uppercase tracking-wider text-xs">Enterprise Scale</div>
                            <div class="flex items-baseline gap-1">
                                <span class="font-headline font-extrabold text-4xl text-white">Custom</span>
                            </div>
                            <p class="text-on-surface-variant text-xs font-semibold">Arsitektur terisolasi dengan regulasi keamanan ketat.</p>
                            <hr class="border-outline-variant">
                            <ul class="text-on-surface-variant text-xs font-semibold space-y-3.5">
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> SAML SSO & Active Audit Logs</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> Dedicated Server Cluster</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> Custom SLA Commitments</li>
                                <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-primary"></i> 24/7 Phone Support Access</li>
                            </ul>
                        </div>
                        <a href="#contact" class="w-full py-3 border border-outline hover:border-primary text-center text-xs font-bold text-white bg-background rounded-xl transition-colors">Contact
                            Enterprise Architecture</a>
                    </div>

                </div>
            </div>
        </section>

        <section id="faq" class="py-24 bg-surface/40 border-y border-outline-variant">
            <div class="max-w-4xl mx-auto px-6">

                <div class="text-center mb-16 space-y-3">
                    <div class="text-xs font-bold text-sky-500 tracking-widest uppercase">System Intelligence</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Frequently Interrogated Architecture</h2>
                </div>

                <div class="space-y-4" x-data="{ activeFaq: null }">
                    @php
                        $faqs = [
                            [
                                'q' => 'Bagaimana parameter logika kerja Smart Sections?',
                                'a' =>
                                    'Smart Sections adalah sistem pengujian prioritas internal. Ketika Anda mempromosikan sebuah tugas, sistem menandai entitas tersebut dan menampilkannya di repositori dasbor global selama 7 hari kalender sebelum masa tayangnya habis secara otomatis untuk menjaga kebersihan data.',
                            ],
                            [
                                'q' => 'Apakah enkripsi data tumpukan tugas terjamin?',
                                'a' =>
                                    'Seluruh data yang diproses di dalam sistem dikirimkan melalui enkripsi protokol TLS 1.3 dalam kondisi transit dan diamankan menggunakan algoritma AES-256 tingkat tinggi di sisi database internal.',
                            ],
                            [
                                'q' => 'Bisakah saya melakukan ekspor riwayat papan kerja?',
                                'a' =>
                                    'Tentu. Anda dapat mengekspor seluruh repositori proyek Anda kapan saja dalam bentuk format JSON terstruktur atau file lembar kerja CSV melalui tab panel kontrol pengaturan proyek.',
                            ],
                            [
                                'q' => 'Apakah tersedia skema kustomisasi webhook mandiri?',
                                'a' =>
                                    'Ya, pada paket Team ke atas, Anda dapat mengonfigurasi webhook kustom keluar (Outgoing Webhooks) untuk menembakkan payload data JSON ke server API internal Anda sendiri setiap ada perubahan status kartu.',
                            ],
                        ];
                    @endphp
                    @foreach ($faqs as $index => $f)
                        <div class="border border-outline bg-surface rounded-xl overflow-hidden transition-colors shadow-sm">
                            <button @click="activeFaq === {{ $index }} ? activeFaq = null : activeFaq = {{ $index }}"
                                class="w-full p-5 text-left flex items-center justify-between text-white font-bold text-sm sm:text-base hover:bg-slate-700/40 transition-colors">
                                <span>{{ $f['q'] }}</span>
                                <i class="fa-solid text-xs text-outline transition-transform duration-300" :class="activeFaq === {{ $index }} ? 'fa-minus rotate-180' : 'fa-plus'"></i>
                            </button>
                            <div x-show="activeFaq === {{ $index }}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-40"
                                class="p-5 pt-0 text-on-surface-variant font-medium text-xs sm:text-sm border-t border-outline-variant bg-background/40 leading-relaxed">
                                {{ $f['a'] }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section id="cta" class="py-24 relative overflow-hidden">
            <div class="max-w-5xl mx-auto px-6">
                <div class="p-8 sm:p-12 rounded-3xl bg-linear-to-tr from-surface to-slate-800 border border-outline relative overflow-hidden text-center shadow-2xl space-y-6">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary/10 rounded-full blur-2xl pointer-events-none"></div>

                    <h2 class="font-headline text-3xl sm:text-4xl font-extrabold text-white tracking-tight">Ready to orchestrate work beautifully?</h2>
                    <p class="text-on-surface-variant font-medium text-sm sm:text-base max-w-xl mx-auto">
                        Bergabunglah dengan ribuan pengembang dan manajer produk profesional hari ini. Mulai dengan siklus gratis tanpa kartu kredit.
                    </p>

                    <form action="{{ route('register') }}" method="GET" class="mt-8 max-w-lg mx-auto flex flex-col sm:flex-row gap-3">
                        <input name="email" type="email" placeholder="Enter your corporate email address" required
                            class="px-4 py-3.5 rounded-xl bg-background border border-outline focus:border-primary focus:ring-1 focus:ring-primary text-white text-sm flex-1 transition-all shadow-inner placeholder:text-slate-500" />
                        <button type="submit"
                            class="px-6 py-3.5 bg-linear-to-r from-secondary to-secondary-container text-white font-bold text-sm rounded-xl shadow-md hover:brightness-110 active:scale-98 transition-all whitespace-nowrap">
                            Create Free Engine
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section id="team" class="py-24 bg-surface/40 border-t border-outline-variant">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <div class="text-xs font-bold text-primary tracking-widest uppercase">Founding Core</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">System Operators</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @php
                        $roles = ['Core Engineering', 'UI/UX Design Architect', 'Product Operations', 'Growth Infrastructure'];
                        $teamNames = ['Alexei Rivera', 'Sophia Thorne', 'Hanafi Setiawan', 'David Kross'];
                    @endphp
                    @for ($i = 0; $i < 4; $i++)
                        <div class="p-5 bg-surface border border-outline rounded-2xl text-center hover:border-primary/40 transition-colors group shadow-sm">
                            <div
                                class="w-16 h-16 rounded-2xl mx-auto bg-linear-to-tr from-slate-700 to-slate-600 flex items-center justify-center text-primary font-headline font-bold text-xl shadow-inner border border-outline-variant group-hover:scale-105 transition-transform">
                                {{ substr($teamNames[$i], 0, 1) }}
                            </div>
                            <h3 class="mt-4 font-bold text-white text-sm tracking-tight">{{ $teamNames[$i] }}</h3>
                            <div class="text-on-surface-variant font-semibold text-[11px] mt-1">{{ $roles[$i] }}</div>
                        </div>
                    @endfor
                </div>

            </div>
        </section>

        <section id="contact" class="py-24 border-t border-outline-variant">
            <div class="max-w-3xl mx-auto px-6 space-y-12">

                <div class="text-center space-y-3">
                    <div class="text-xs font-bold text-secondary tracking-widest uppercase">Support Interface</div>
                    <h2 class="font-headline text-2xl sm:text-3xl font-extrabold text-white">Establish Connection</h2>
                </div>

                <form action="/" method="POST" class="p-8 rounded-2xl bg-surface border border-outline space-y-5 shadow-2xl">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Identity Name</label>
                            <input name="name" placeholder="John Doe" required
                                class="w-full p-3 bg-background border border-outline focus:border-secondary rounded-xl text-white text-sm transition-all placeholder:text-slate-500" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Secure Email Address</label>
                            <input name="email" type="email" placeholder="john@company.com" required
                                class="w-full p-3 bg-background border border-outline focus:border-secondary rounded-xl text-white text-sm transition-all placeholder:text-slate-500" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Subject Classification</label>
                        <input name="subject" placeholder="Enterprise Cluster Request" required
                            class="w-full p-3 bg-background border border-outline focus:border-secondary rounded-xl text-white text-sm transition-all placeholder:text-slate-500" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Detailed Message Stream</label>
                        <textarea name="message" rows="5" placeholder="Describe your structural engineering or plan alignment needs..." required
                            class="w-full p-3 bg-background border border-outline focus:border-secondary rounded-xl text-white text-sm transition-all placeholder:text-slate-500"></textarea>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button
                            class="px-6 py-3.5 bg-linear-to-r from-secondary to-secondary-container text-white font-bold text-sm rounded-xl shadow-lg hover:brightness-110 transition-all active:scale-98">
                            Transmit Message Data
                        </button>
                    </div>
                </form>

            </div>
        </section>

    </main>

    <footer class="bg-surface-container-lowest border-t border-outline-variant relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-10 md:gap-8">

            <div class="md:col-span-4 space-y-4">
                <a href="#" class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-linear-to-tr from-primary to-secondary flex items-center justify-center shadow-md">
                        <i class="fa-solid fa-layer-group text-white text-xs"></i>
                    </div>
                    <span class="text-white font-headline font-bold text-lg tracking-tight">Task Flow</span>
                </a>
                <p class="text-on-surface-variant text-xs font-semibold max-w-xs leading-relaxed">
                    Sistem orkestrasi tugas asinkronus kelas industri, menyederhanakan siklus sprint untuk pertumbuhan tim eksponensial.
                </p>
                <div class="flex items-center gap-4 text-outline text-sm pt-2">
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <div class="md:col-span-2 space-y-4">
                <h4 class="text-white font-bold text-xs uppercase tracking-wider">Product Core</h4>
                <ul class="space-y-2.5 text-on-surface-variant text-xs font-bold">
                    <li><a href="#features" class="hover:text-primary transition-colors">Framework Features</a></li>
                    <li><a href="#projects" class="hover:text-primary transition-colors">Sandbox Papan Kerja</a></li>
                    <li><a href="#pricing" class="hover:text-primary transition-colors">Pricing Structure</a></li>
                    <li><a href="#roadmap" class="hover:text-primary transition-colors">Strategic Roadmap</a></li>
                </ul>
            </div>

            <div class="md:col-span-2 space-y-4">
                <h4 class="text-white font-bold text-xs uppercase tracking-wider">Solutions</h4>
                <ul class="space-y-2.5 text-on-surface-variant text-xs font-bold">
                    <li><a href="#usecases" class="hover:text-primary transition-colors">Product Engineering</a></li>
                    <li><a href="#usecases" class="hover:text-primary transition-colors">Creative Agencies</a></li>
                    <li><a href="#usecases" class="hover:text-primary transition-colors">Operations Operations</a></li>
                </ul>
            </div>

            <div class="md:col-span-2 space-y-4">
                <h4 class="text-white font-bold text-xs uppercase tracking-wider">Company Hub</h4>
                <ul class="space-y-2.5 text-on-surface-variant text-xs font-bold">
                    <li><a href="#team" class="hover:text-primary transition-colors">System Operators</a></li>
                    <li><a href="#contact" class="hover:text-primary transition-colors">Contact Interface</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Press Portfolio</a></li>
                </ul>
            </div>

            <div class="md:col-span-2 space-y-4">
                <h4 class="text-white font-bold text-xs uppercase tracking-wider">Legal Regulation</h4>
                <ul class="space-y-2.5 text-on-surface-variant text-xs font-bold">
                    <li><a href="#" class="hover:text-primary transition-colors">Privacy Architecture</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Terms of Operations</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Security Enclave</a></li>
                </ul>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-6 py-6 border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-4 text-on-surface-variant text-xs font-bold">
            <div>
                © 2026 Task Flow Global Enclave Inc. All structures reserved.
            </div>
            <div>
                Built with Laravel Engine, Tailwind Architecture & Alpine Micro-State.
            </div>
        </div>
    </footer>

</body>

</html>
