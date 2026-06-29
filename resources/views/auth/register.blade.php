<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow | Register</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #051424;
            color: #d4e4fa;
        }

        .font-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        .custom-shadow {
            box-shadow: 0 12px 24px -4px rgba(0, 0, 0, 0.6), 0 0 0 1px #334155;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="antialiased selection:bg-[#8083ff]/30 selection:text-[#c0c1ff]">

    <main class="min-h-screen flex flex-col md:flex-row" x-data="{
        fullName: '',
        email: '',
        password: '',
        confirmPassword: '',
        terms: false,
        mouseX: 0,
        mouseY: 0,
        handleMouseMove(e) {
            this.mouseX = (e.clientX - window.innerWidth / 2) / 50;
            this.mouseY = (e.clientY - window.innerHeight / 2) / 50;
        }
    }">

        <section class="hidden md:flex flex-1 relative overflow-hidden bg-[#051424]" @mousemove="handleMouseMove($event)">
            <div class="absolute inset-0 bg-linear-to-br from-[#c0c1ff]/10 via-[#051424] to-[#051424]"></div>

            <div class="relative z-20 flex flex-col justify-between w-full p-10">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#8083ff] rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-chart-pie text-[#07006c] text-xl"></i>
                    </div>
                    <span class="font-heading text-xl text-[#d4e4fa] font-bold tracking-tight">TaskFlow</span>
                </div>

                <div class="w-full max-w-2xl mx-auto space-y-6 transition-transform duration-75 ease-out" :style="`transform: translate(${mouseX}px, ${mouseY}px)`">
                    <div class="glass-card p-6 rounded-2xl custom-shadow space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="font-heading font-semibold text-lg text-[#d4e4fa]">Sprints Planning</span>
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-[#122131] bg-[#6ffbbe] flex items-center justify-center text-[10px] font-bold text-[#002113]">SK</div>
                                <div class="w-8 h-8 rounded-full border-2 border-[#122131] bg-[#e1e0ff] flex items-center justify-center text-[10px] font-bold text-[#07006c]">AM</div>
                                <div class="w-8 h-8 rounded-full border-2 border-[#122131] bg-[#ffdcc5] flex items-center justify-center text-[10px] font-bold text-[#301400]">+2</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <div class="flex items-center gap-2 px-1">
                                    <div class="w-2 h-2 rounded-full bg-[#8083ff]"></div>
                                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">In Progress</span>
                                </div>
                                <div class="bg-[#1c2b3c] p-4 rounded-xl border border-slate-700/30 space-y-2">
                                    <p class="text-sm font-medium text-[#d4e4fa]">Setup Backend Auth</p>
                                    <div class="flex items-center gap-2 text-slate-400">
                                        <i class="fa-regular fa-clock text-xs"></i>
                                        <span class="text-[11px]">Priority High</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center gap-2 px-1">
                                    <div class="w-2 h-2 rounded-full bg-[#4edea3]"></div>
                                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Completed</span>
                                </div>
                                <div class="bg-[#1c2b3c]/60 p-4 rounded-xl border border-slate-700/30 opacity-60">
                                    <p class="text-sm font-medium text-[#d4e4fa]">Design System Tokens</p>
                                    <div class="mt-2 w-full bg-[#273647] h-1 rounded-full overflow-hidden">
                                        <div class="bg-[#4edea3] w-full h-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-md">
                    <p class="font-heading text-lg text-[#d4e4fa] mb-3">"Build your most productive workflow yet, one automated task at a time."</p>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-1 bg-[#c0c1ff] rounded-full"></div>
                        <span class="text-xs font-semibold text-[#c0c1ff] tracking-widest uppercase">Productivity Engine v4.0</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full md:w-[45%] xl:w-[40%] bg-[#051424] flex flex-col justify-center p-6 lg:p-10 z-10 border-l border-slate-800">
            <div class="max-w-md w-full mx-auto space-y-6">

                <div class="md:hidden flex items-center gap-2 mb-8">
                    <i class="fa-solid fa-circle-check text-[#c0c1ff] text-3xl"></i>
                    <span class="font-heading font-extrabold text-2xl text-[#c0c1ff] tracking-tight">TaskFlow</span>
                </div>

                <header class="space-y-2">
                    <h1 class="font-heading font-bold text-4xl text-[#d4e4fa] tracking-tight">Get started</h1>
                    <p class="text-base text-[#c7c4d7]">Create your workspace account today.</p>
                </header>

                @if ($errors->any())
                    <div class="p-4 bg-rose-950/50 border border-rose-500/30 rounded-xl text-rose-400 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('auth.store') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-2" x-data="{ focused: false }">
                        <label class="text-xs font-semibold uppercase tracking-wider text-[#c7c4d7]" for="name">Full Name</label>
                        <div class="relative transition-transform duration-200" :class="focused ? 'scale-[1.01]' : ''">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors duration-200" :class="focused ? 'text-[#c0c1ff]' : 'text-slate-400'">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            <input
                                class="w-full pl-12 pr-4 py-3 bg-[#010f1f] border border-slate-700 rounded-xl text-[#d4e4fa] placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-[#8083ff] focus:border-transparent transition-all"
                                id="name" name="name" type="text" x-model="fullName" @focus="focused = true" @blur="focused = false" placeholder="John Doe" value="{{ old('name') }}"
                                required autofocus />
                        </div>
                    </div>

                    <div class="space-y-2" x-data="{ focused: false }">
                        <label class="text-xs font-semibold uppercase tracking-wider text-[#c7c4d7]" for="email">Email Address</label>
                        <div class="relative transition-transform duration-200" :class="focused ? 'scale-[1.01]' : ''">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors duration-200" :class="focused ? 'text-[#c0c1ff]' : 'text-slate-400'">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input
                                class="w-full pl-12 pr-4 py-3 bg-[#010f1f] border border-slate-700 rounded-xl text-[#d4e4fa] placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-[#8083ff] focus:border-transparent transition-all"
                                id="email" name="email" type="email" x-model="email" @focus="focused = true" @blur="focused = false" placeholder="name@company.com" value="{{ old('email') }}"
                                required />
                        </div>
                    </div>

                    <div class="space-y-2" x-data="{ focused: false, showPassword: false }">
                        <label class="text-xs font-semibold uppercase tracking-wider text-[#c7c4d7]" for="password">Password</label>
                        <div class="relative transition-transform duration-200" :class="focused ? 'scale-[1.01]' : ''">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors duration-200" :class="focused ? 'text-[#c0c1ff]' : 'text-slate-400'">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input
                                class="w-full pl-12 pr-12 py-3 bg-[#010f1f] border border-slate-700 rounded-xl text-[#d4e4fa] placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-[#8083ff] focus:border-transparent transition-all"
                                id="password" name="password" :type="showPassword ? 'text' : 'password'" x-model="password" @focus="focused = true" @blur="focused = false"
                                placeholder="••••••••" required />
                        </div>
                    </div>

                    <div class="space-y-2" x-data="{ focused: false, showPassword: false }">
                        <label class="text-xs font-semibold uppercase tracking-wider text-[#c7c4d7]" for="password_confirmation">Confirm Password</label>
                        <div class="relative transition-transform duration-200" :class="focused ? 'scale-[1.01]' : ''">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors duration-200" :class="focused ? 'text-[#c0c1ff]' : 'text-slate-400'">
                                <i class="fa-solid fa-shield-halved"></i>
                            </span>
                            <input
                                class="w-full pl-12 pr-12 py-3 bg-[#010f1f] border border-slate-700 rounded-xl text-[#d4e4fa] placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-[#8083ff] focus:border-transparent transition-all"
                                id="password_confirmation" name="password_confirmation" :type="showPassword ? 'text' : 'password'" x-model="confirmPassword" @focus="focused = true"
                                @blur="focused = false" placeholder="••••••••" required />
                        </div>
                        <p x-show="confirmPassword && password !== confirmPassword" class="text-xs text-rose-400 mt-1" x-transition>
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> Password tidak cocok.
                        </p>
                    </div>

                    <div class="flex items-start gap-3 pt-1">
                        <input class="mt-0.5 w-4 h-4 rounded border-slate-700 bg-[#010f1f] text-[#8083ff] focus:ring-[#8083ff] focus:ring-offset-0 cursor-pointer" id="terms" type="checkbox"
                            x-model="terms" required />
                        <label class="text-xs text-[#c7c4d7] select-none cursor-pointer leading-normal" for="terms">
                           I agree <a class="text-[#c0c1ff] font-medium hover:underline" href="#">Terms of Service</a> and <a class="text-[#c0c1ff] font-medium hover:underline"
                                href="#">Privacy Policy</a>
                        </label>
                    </div>

                    <button :disabled="!terms || (password !== confirmPassword)"
                        class="w-full py-3 bg-[#8083ff] text-[#07006c] font-heading font-semibold rounded-xl hover:bg-opacity-90 transition-all active:scale-[0.98] custom-shadow disabled:opacity-50 disabled:pointer-events-none disabled:scale-100"
                        type="submit">
                        Create Account
                    </button>
                </form>

                <p class="text-center text-sm text-[#c7c4d7]">
                    Already have an account?
                    <a class="text-[#c0c1ff] font-semibold hover:underline" href="{{ route('login') }}">Login here</a>
                </p>
            </div>
        </section>

    </main>

    <script src="{{ asset('assets/vendor/fontawesome/all.min.js') }}"></script>
</body>

</html>
