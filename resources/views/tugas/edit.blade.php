<x-main title="Update Task">
    <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[-5%] left-[-5%] w-[30%] h-[30%] bg-secondary/10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="w-full relative z-10 p-md sm:p-lg overflow-y-auto h-[calc(100vh-4rem)]">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl">
            <div>
                <div class="flex items-center gap-sm text-primary mb-sm">
                    <i class="fa-solid fa-arrow-left text-[14px]"></i>
                    <a class="text-[12px] font-semibold tracking-wider hover:underline" href="{{ route('tugas.index') }}">Back to Task Board</a>
                </div>
                <h2 class="font-headline font-bold text-[24px] sm:text-headline-xl text-on-surface">Edit Task</h2>
                <p class="text-on-surface-variant text-[14px] sm:text-body-lg mt-xs sm:mt-sm">Modify details for the current development sprint.</p>
            </div>
            <div class="flex gap-sm w-full md:w-auto">

                <form id="delete-form-{{ $tugas->id }}" action="{{ route('tugas.destroy', $tugas->id) }}" method="POST" class="inline" x-data="{ openDeleteModal: false }"
                    @submit.prevent="openDeleteModal = true">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-full md:w-auto justify-center px-md py-sm rounded-lg border border-error/50 text-error text-[12px] font-semibold tracking-wider flex items-center gap-xs hover:bg-error/10 transition-colors active:scale-95">
                        <i class="fa-solid fa-trash-can text-[14px]"></i>
                        Delete Task
                    </button>

                    <template x-teleport="body">
                        <div x-show="openDeleteModal" class="fixed inset-0 z-100 flex items-center justify-center p-md overflow-x-hidden overflow-y-auto" x-cloak>

                            <div x-show="openDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="openDeleteModal = false"
                                class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

                            <div x-show="openDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="relative w-full max-w-md bg-surface-container border border-outline-variant/20 rounded-2xl p-lg shadow-2xl flex flex-col gap-md text-left mx-md">

                                <div class="flex items-start gap-md">
                                    <div class="w-10 h-10 rounded-xl bg-error/20 flex items-center justify-center text-error shrink-0 border border-error/30">
                                        <i class="fa-solid fa-triangle-exclamation text-[18px]"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-[16px] font-bold text-on-surface">Delete Task?</h3>
                                        <p class="text-[13px] text-on-surface-variant mt-xs leading-relaxed">
                                            Are you sure you want to delete <span class="font-semibold text-primary">"{{ $tugas->task }}"</span>? This action cannot be
                                            undone.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-sm mt-sm">
                                    <button type="button" @click="openDeleteModal = false"
                                        class="px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-[12px] font-semibold hover:bg-surface-container-high hover:text-on-surface transition-colors">
                                        Cancel
                                    </button>

                                    <button type="button" @click="document.getElementById('delete-form-{{ $tugas->id }}').submit()"
                                        class="px-md py-sm bg-red-600 text-white font-semibold text-[12px] rounded-lg shadow-md shadow-error/10 hover:brightness-110 transition-all flex items-center gap-xs">
                                        <i class="fa-solid fa-trash text-[12px]"></i>
                                        Delete Task
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </form>

            </div>
        </div>

        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-md sm:gap-lg">
            @csrf
            @method('PUT')

            <div class="col-span-1 md:col-span-8 space-y-md sm:space-y-lg">
                <div class="glass-effect p-md sm:p-lg rounded-xl border border-outline-variant/50">
                    <div class="space-y-md sm:space-y-lg">
                        <div class="space-y-sm">
                            <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Task Name</label>
                            <input
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md text-base sm:text-headline-md font-headline focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface"
                                type="text" name="task" value="{{ $tugas->task }}" />
                        </div>
                        <div class="space-y-sm">
                            <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Description</label>
                            <textarea
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface-variant leading-relaxed"
                                name="description" rows="6">{{ $tugas->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-4 space-y-md sm:space-y-lg">
                <div class="glass-effect p-md sm:p-lg rounded-xl space-y-md sm:space-y-lg border border-outline-variant/50">
                    <div class="space-y-sm">
                        <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Status</label>
                        <div class="relative">
                            <select
                                class="w-full appearance-none bg-surface-container-lowest border border-outline-variant rounded-lg p-md pr-10 text-[14px] text-on-surface focus:ring-1 focus:ring-primary focus:border-primary"
                                name="status">
                                <option value="To Do" {{ $tugas->status === 'To Do' ? 'selected' : '' }}>To Do</option>
                                <option value="In Progress" {{ $tugas->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Review" {{ $tugas->status === 'Review' ? 'selected' : '' }}>Review</option>
                                <option value="Completed" {{ $tugas->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant text-[12px]"></i>
                        </div>
                    </div>
                    <div class="space-y-sm">
                        <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Priority</label>
                        <div class="flex gap-sm">
                            <button type="button" onclick="setPriority('Low', this)"
                                class="flex-1 py-sm rounded-lg border {{ $tugas->priority === 'Low' ? 'border-success bg-success/10 text-success' : 'border-outline-variant text-on-surface-variant hover:bg-surface-container' }} text-[12px] font-semibold tracking-wider transition-all active:scale-95">Low</button>
                            <button type="button" onclick="setPriority('Medium', this)"
                                class="flex-1 py-sm rounded-lg border {{ $tugas->priority === 'Medium' ? 'border-tertiary-container bg-tertiary-container/10 text-tertiary-container' : 'border-outline-variant text-on-surface-variant hover:bg-surface-container' }} text-[12px] font-semibold tracking-wider transition-all active:scale-95">Med</button>
                            <button type="button" onclick="setPriority('High', this)"
                                class="flex-1 py-sm rounded-lg border {{ $tugas->priority === 'High' ? 'border-error bg-error/10 text-error' : 'border-outline-variant text-on-surface-variant hover:bg-surface-container' }} text-[12px] font-semibold tracking-wider transition-all active:scale-95">High</button>
                            <input type="hidden" name="priority" id="priority-input" value="{{ $tugas->priority }}">
                        </div>
                    </div>
                    <div class="space-y-sm">
                        <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Due Date</label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar-days absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[14px]"></i>
                            <input
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md pl-10 text-[14px] text-on-surface focus:ring-1 focus:ring-primary focus:border-primary cursor-pointer color-scheme-dark"
                                type="date" name="due_date" value="{{ $tugas->due_date }}" />
                        </div>
                    </div>
                </div>

                {{-- <div class="glass-effect p-md sm:p-lg rounded-xl border border-outline-variant/50">
                    <h4 class="text-[11px] font-semibold tracking-wider text-on-surface-variant uppercase mb-sm">Task History</h4>
                    <ul class="text-[11px] space-y-sm text-on-surface-variant">
                        @foreach ($tugas->activityLogs as $log)
                        <li class="flex gap-sm">
                            <span class="{{ $log->type === 'creation' ? 'text-primary' : 'text-secondary' }}">•</span>
                            <span>{{ $log->message }} by {{ $log->user->name }} — {{ $log->created_at->diffForHumans() }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>

            <div class="col-span-1 md:col-span-12 mt-xl flex flex-col sm:flex-row items-center justify-between pt-lg border-t border-outline-variant/50 gap-md sm:gap-0">
                <a href="{{ route('tugas.index') }}"
                    class="w-full sm:w-auto text-center px-lg py-md rounded-xl text-on-surface-variant text-[12px] font-semibold tracking-wider hover:text-on-surface hover:bg-surface-container transition-all">
                    Cancel Changes
                </a>
                <div class="flex gap-md w-full sm:w-auto">
                    <button type="submit"
                        class="w-full sm:w-auto justify-center px-xl py-md bg-primary text-on-primary font-bold text-[12px] tracking-wider rounded-xl shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-sm">
                        <i class="fa-solid fa-floppy-disk text-[14px]"></i>
                        Update Task
                    </button>
                </div>
            </div>
        </form>

    </div>

    <script>
        // Micro-interaction for form focus elements
        document.querySelectorAll('input, textarea, select').forEach(el => {
            el.addEventListener('focus', () => {
                el.closest('.glass-effect')?.classList.add('ring-1', 'ring-primary/20');
            });
            el.addEventListener('blur', () => {
                el.closest('.glass-effect')?.classList.remove('ring-1', 'ring-primary/20');
            });
        });

        function setPriority(level, button) {
            // 1. Ambil elemen input hidden untuk priority
            const input = document.getElementById('priority-input');
            if (!input) return;

            // 2. Set nilai input hidden menjadi Low, Medium, atau High
            input.value = level;

            // 3. Ambil semua tombol priority dalam satu baris grup yang sama
            const buttons = button.parentElement.querySelectorAll('button');

            // 4. Reset semua tombol ke tampilan default (tidak aktif)
            buttons.forEach(btn => {
                btn.className =
                    "flex-1 py-sm rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container text-[12px] font-semibold tracking-wider transition-all active:scale-95";
            });

            // 5. Berikan warna aktif (highlight) khusus sesuai dengan tingkat priority yang di-klik
            if (level === 'Low') {
                button.className = "flex-1 py-sm rounded-lg border border-success bg-success/10 text-success text-[12px] font-semibold tracking-wider transition-all active:scale-95";
            } else if (level === 'Medium') {
                button.className =
                    "flex-1 py-sm rounded-lg border border-tertiary-container bg-tertiary-container/10 text-tertiary-container text-[12px] font-semibold tracking-wider transition-all active:scale-95";
            } else if (level === 'High') {
                button.className = "flex-1 py-sm rounded-lg border border-error bg-error/10 text-error text-[12px] font-semibold tracking-wider transition-all active:scale-95";
            }
        }
    </script>
</x-main>
