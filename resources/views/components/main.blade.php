<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow | {{ $title ?? 'Task Flow' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-low": "#0d1c2d",
                        "secondary-fixed": "#6ffbbe",
                        "error-container": "#93000a",
                        "on-secondary": "#003824",
                        "on-error-container": "#ffdad6",
                        "on-tertiary": "#4f2500",
                        "surface-container-lowest": "#010f1f",
                        "inverse-primary": "#494bd6",
                        "surface-bright": "#2c3a4c",
                        "surface": "#051424",
                        "on-surface-variant": "#c7c4d7",
                        "on-tertiary-container": "#452000",
                        "tertiary-fixed-dim": "#ffb783",
                        "tertiary-container": "#d97721",
                        "on-primary-fixed": "#07006c",
                        "on-background": "#d4e4fa",
                        "primary-fixed": "#e1e0ff",
                        "outline": "#908fa0",
                        "primary": "#c0c1ff",
                        "surface-dim": "#051424",
                        "error": "#ffb4ab",
                        "tertiary": "#ffb783",
                        "secondary-container": "#00a572",
                        "on-secondary-container": "#00311f",
                        "surface-container-highest": "#273647",
                        "on-primary-container": "#0d0096",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "on-secondary-fixed": "#002113",
                        "primary-container": "#8083ff",
                        "on-primary": "#1000a9",
                        "surface-tint": "#c0c1ff",
                        "inverse-surface": "#d4e4fa",
                        "surface-variant": "#273647",
                        "secondary": "#4edea3",
                        "outline-variant": "#464554",
                        "tertiary-fixed": "#ffdcc5",
                        "surface-container": "#122131",
                        "inverse-on-surface": "#233143",
                        "on-surface": "#d4e4fa",
                        "on-error": "#690005",
                        "surface-container-high": "#1c2b3c",
                        "on-tertiary-fixed-variant": "#703700",
                        "primary-fixed-dim": "#c0c1ff",
                        "on-tertiary-fixed": "#301400",
                        "secondary-fixed-dim": "#4edea3",
                        "on-secondary-fixed-variant": "#005236",
                        "background": "#051424"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "lg": "24px",
                        "xs": "4px",
                        "sm": "8px",
                        "md": "16px",
                        "base": "4px",
                        "sidebar-width": "260px",
                        "xl": "40px",
                        "column-gutter": "20px"
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
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #051424;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #464554;
        }

        .kanban-column {
            min-width: 320px;
            max-width: 320px;
        }

        .glass-effect {
            backdrop-filter: blur(8px);
            background: rgba(30, 41, 59, 0.7);
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen flex overflow-hidden antialiased">

    <aside class="hidden md:flex flex-col py-lg px-md bg-surface-container fixed left-0 top-0 h-screen w-sidebar-width border-r border-outline-variant shadow-none z-50">
        <div class="mb-xl px-sm">
            <h1 class="font-headline font-bold text-[18px] leading-6 text-primary tracking-tight">Task FLow</h1>
            <p class="text-on-surface-variant text-[12px] font-semibold tracking-wider uppercase mt-1">Pro Plan</p>
        </div>

        <nav class="flex-1 space-y-1">
            @php
                $dashboardActive = request()->routeIs('dashboard');
                $tugasActive = request()->routeIs('tugas.*');
            @endphp

            <a class="flex items-center gap-md px-md py-sm rounded-lg transition-transform text-[12px] font-semibold tracking-wider 
                {{ $dashboardActive ? 'text-secondary-fixed bg-secondary-container active:translate-x-1' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high active:translate-x-1' }}"
                href="{{ route('dashboard') }}">
                <i class="fa-solid fa-table-columns text-[16px] w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-md px-md py-sm rounded-lg transition-transform text-[12px] font-semibold tracking-wider 
                {{ $tugasActive ? 'text-secondary-fixed bg-secondary-container active:translate-x-1' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high active:translate-x-1' }}"
                href="{{ route('tugas.index') }}">
                <i class="fa-solid fa-list-check text-[16px] w-5 text-center"></i>
                <span>Task</span>
            </a>
        </nav>

        <div class="mt-auto border-t border-outline-variant pt-md px-sm">
            <div class="flex items-center gap-md mb-md">
                <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold text-[10px]">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                <div class="flex-1 overflow-hidden">
                    <p class="text-on-surface text-[12px] font-semibold tracking-wider truncate">{{ auth()->user()->name }}</p>
                    <p class="text-on-surface-variant text-[10px] truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button
                    class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high rounded-lg active:translate-x-1 transition-transform text-[12px] font-semibold tracking-wider w-full">
                    <i class="fa-solid fa-right-from-bracket text-[16px] w-5 text-center"></i>
                    <span>Logout</span>
                </button>
            </form>
            <div class="mt-4 pt-3 border-t border-outline-variant text-center">
                <p class="text-on-surface-variant text-[10px]">Developed by <span class="text-secondary font-medium">Gilang's</span></p>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col md:ml-65 h-screen overflow-hidden">
        <header class="flex justify-between items-center w-full px-lg h-16 bg-surface border-b border-outline-variant shadow-sm z-40 sticky top-0">
            <div class="flex items-center gap-lg">
                <div class="md:hidden">
                    <button class="text-primary cursor-pointer p-xs hover:bg-surface-variant rounded-full transition-colors">
                        <i class="fa-solid fa-bars text-[18px]"></i>
                    </button>
                </div>
                <div class="hidden sm:flex items-center bg-surface-container-highest rounded-full px-md py-xs border border-outline-variant group focus-within:border-primary transition-all">
                    <i class="fa-solid fa-magnifying-glass text-on-surface-variant group-focus-within:text-primary mr-sm text-[14px]"></i>
                    <input class="bg-transparent border-none focus:ring-0 text-[14px] leading-5 text-on-surface placeholder:text-on-surface-variant w-48 lg:w-64 focus:outline-none"
                        placeholder="Search tasks..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-md">
                <button class="text-on-surface-variant hover:bg-surface-variant transition-colors w-9 h-9 flex items-center justify-center rounded-full cursor-pointer active:scale-95">
                    <i class="fa-solid fa-bell"></i>
                </button>
                <button class="text-on-surface-variant hover:bg-surface-variant transition-colors w-9 h-9 flex items-center justify-center rounded-full cursor-pointer active:scale-95">
                    <i class="fa-solid fa-comment-dots"></i>
                </button>
                <div class="h-8 w-px bg-outline-variant mx-sm"></div>
                <div
                    class="w-8 h-8 rounded-full border border-primary-container bg-primary-container flex items-center justify-center text-on-primary-container font-bold text-[10px] cursor-pointer hover:ring-2 ring-primary transition-all">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
            </div>
        </header>

        {{ $slot }}
    </main>

    <script src="{{ asset('assets/vendor/fontawesome/all.min.js') }}"></script>
    <script>
        // Micro-interactions untuk Kanban Cards
        document.querySelectorAll('.kanban-column > div > div').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.borderColor = '#494bd6';
            });
            card.addEventListener('mouseleave', () => {
                if (!card.classList.contains('border-primary/40')) {
                    card.style.borderColor = '#334155';
                }
            });
        });
    </script>
</body>

</html>
