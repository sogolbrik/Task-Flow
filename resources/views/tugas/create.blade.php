<x-main title="Create Task">
    <!-- Ambient Atmospheric Glow -->
    <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[-5%] left-[-5%] w-[30%] h-[30%] bg-secondary/10 blur-[100px] rounded-full pointer-events-none"></div>

    <!-- layout diubah menjadi w-full tanpa max-w-4xl mx-auto agar mepet full -->
    <div class="w-full relative z-10 p-lg overflow-y-auto h-[calc(100vh-4rem)]">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl">
            <div>
                <div class="flex items-center gap-sm text-primary mb-sm">
                    <i class="fa-solid fa-arrow-left text-[14px]"></i>
                    <a class="text-[12px] font-semibold tracking-wider hover:underline" href="{{ route('tugas.index') }}">Back to Task Board</a>
                </div>
                <h2 class="font-headline font-bold text-headline-xl text-on-surface">Create New Task</h2>
                <p class="text-on-surface-variant text-body-lg mt-sm">Add details to initialize a new task for the current sprint.</p>
            </div>
        </div>

        <!-- Form Bento Layout -->
        <form action="{{ route('tugas.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-lg">
            @csrf

            <!-- Main Form Column -->
            <div class="md:col-span-8 space-y-lg">
                <!-- Task Title & Description Card -->
                <div class="glass-effect p-lg rounded-xl border border-outline-variant/50">
                    <div class="space-y-lg">
                        <div class="space-y-sm">
                            <label for="task_name" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Task Name</label>
                            <input id="task_name" name="task" type="text" required
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md text-headline-md font-headline focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface"
                                placeholder="e.g., Implement API Authentication" />
                        </div>
                        <div class="space-y-sm">
                            <label for="description" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Description <small
                                    class="text-on-surface-variant/60">(optional)</small></label>
                            <textarea id="description" name="description" rows="6" required
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-on-surface-variant leading-relaxed"
                                placeholder="Provide a detailed description of the task requirements, target environment, and expected outcomes..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Metadata Column -->
            <div class="md:col-span-4 space-y-lg">
                <!-- Status & Priority -->
                <div class="glass-effect p-lg rounded-xl space-y-lg border border-outline-variant/50">
                    <div class="space-y-sm">
                        <label for="status" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Status</label>
                        <div class="relative">
                            <select id="status" name="status"
                                class="w-full appearance-none bg-surface-container-lowest border border-outline-variant rounded-lg p-md pr-10 text-[14px] text-on-surface focus:ring-1 focus:ring-primary focus:border-primary">
                                <option value="To Do" selected>To Do</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Review">Review</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant text-[12px]"></i>
                        </div>
                    </div>

                    <div class="space-y-sm">
                        <label class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Priority</label>
                        <input type="hidden" name="priority" id="priority_input" value="Medium">
                        <div class="flex gap-sm" id="priority_group">
                            <button type="button" data-value="Low"
                                class="priority-btn flex-1 py-sm rounded-lg border border-outline-variant text-[12px] font-semibold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all active:scale-95">Low</button>
                            <button type="button" data-value="Medium"
                                class="priority-btn flex-1 py-sm rounded-lg border border-tertiary-container bg-tertiary-container/10 text-tertiary-container text-[12px] font-semibold tracking-wider active:scale-95">Med</button>
                            <button type="button" data-value="High"
                                class="priority-btn flex-1 py-sm rounded-lg border border-outline-variant text-[12px] font-semibold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all active:scale-95">High</button>
                        </div>
                    </div>

                    <div class="space-y-sm">
                        <label for="due_date" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Due Date</label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar-days absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[14px]"></i>
                            <input id="due_date" name="due_date" type="date" required
                                class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg p-md pl-10 text-[14px] text-on-surface focus:ring-1 focus:ring-primary focus:border-primary color-scheme-dark" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Action Footer -->
            <div class="md:col-span-12 mt-xl flex items-center justify-between pt-lg border-t border-outline-variant/50">
                <a href="{{ route('tugas.index') }}"
                    class="px-lg py-md rounded-xl text-on-surface-variant text-[12px] font-semibold tracking-wider hover:text-on-surface hover:bg-surface-container transition-all">
                    Cancel
                </a>
                <div class="flex gap-md">
                    <button type="submit"
                        class="px-xl py-md bg-primary text-on-primary font-bold text-[12px] tracking-wider rounded-xl shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center gap-sm">
                        <i class="fa-solid fa-plus text-[14px]"></i>
                        Create Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .color-scheme-dark {
            color-scheme: dark;
        }
    </style>

    <script>
        document.querySelectorAll('input, textarea, select').forEach(el => {
            el.addEventListener('focus', () => {
                el.closest('.glass-effect')?.classList.add('ring-1', 'ring-primary/20');
            });
            el.addEventListener('blur', () => {
                el.closest('.glass-effect')?.classList.remove('ring-1', 'ring-primary/20');
            });
        });

        const priorityButtons = document.querySelectorAll('.priority-btn');
        const priorityInput = document.getElementById('priority_input');

        priorityButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                priorityButtons.forEach(b => {
                    b.className =
                        "priority-btn flex-1 py-sm rounded-lg border border-outline-variant text-[12px] font-semibold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all active:scale-[0.98]";
                });
                btn.className =
                    "priority-btn flex-1 py-sm rounded-lg border border-tertiary-container bg-tertiary-container/10 text-tertiary-container text-[12px] font-semibold tracking-wider active:scale-[0.98]";
                priorityInput.value = btn.getAttribute('data-value');
            });
        });
    </script>
</x-main>
