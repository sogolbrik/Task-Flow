<div x-data="{
    show: false,
    message: '',
    type: 'success',
    init() {
        @if (session('success')) $nextTick(() => { this.trigger('{{ session('success') }}', 'success') });
            @elseif(session('error'))
                $nextTick(() => { this.trigger('{{ session('error') }}', 'error') });
            @elseif(session('info'))
                $nextTick(() => { this.trigger('{{ session('info') }}', 'info') }); @endif
    },
    trigger(msg, type) {
        this.message = msg;
        this.type = type;
        this.show = true;
        setTimeout(() => { this.show = false }, 4000); // Otomatis hilang dalam 4 detik
    }
}" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95" class="fixed bottom-4 right-4 z-50 flex items-center gap-3 max-w-sm p-3 rounded-lg border shadow-lg backdrop-blur-md"
    :class="{
        'bg-emerald-500/10 border-emerald-500/20 text-emerald-400': type === 'success',
        'bg-rose-500/10 border-rose-500/20 text-rose-400': type === 'error',
        'bg-sky-500/10 border-sky-500/20 text-sky-400': type === 'info'
    }"
    style="display: none;">

    <div class="shrink-0 text-lg">
        <i x-show="type === 'success'" class="fa-solid fa-circle-check"></i>
        <i x-show="type === 'error'" class="fa-solid fa-circle-xmark"></i>
        <i x-show="type === 'info'" class="fa-solid fa-circle-info"></i>
    </div>

    <p class="text-xs font-medium tracking-wide pr-4" x-text="message"></p>

    <button @click="show = false" class="absolute top-2 right-2 hover:opacity-70 transition-opacity cursor-pointer">
        <i class="fa-solid fa-xmark text-[10px]"></i>
    </button>
</div>
