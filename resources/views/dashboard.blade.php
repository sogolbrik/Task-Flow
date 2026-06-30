<x-main title="Dashboard">

    <section class="flex-1 p-md sm:p-lg space-y-md sm:space-y-lg flex flex-col h-full overflow-hidden">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md shrink-0">
            <div>
                <h2 class="font-headline font-bold text-[26px] sm:text-[34px] leading-8 sm:leading-10 tracking-tight text-on-surface">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
                <p class="text-on-surface-variant text-[14px] sm:text-[15px] leading-5 sm:leading-6 mt-1">
                    Berikut adalah daftar tugas pengerjaan Anda yang jatuh tempo pada minggu ini.
                </p>
            </div>
            <a href="{{ route('tugas.create') }}"
                class="bg-primary-container text-on-primary-container px-lg py-md rounded-lg text-[12px] font-semibold tracking-wider flex items-center justify-center gap-sm hover:brightness-110 active:scale-95 transition-all shadow-lg shadow-primary-container/20 w-full sm:w-auto">
                <i class="fa-solid fa-plus font-bold"></i>
                New Task
            </a>
        </div>

        <div x-data="{
            sections: [
                { id: 'todo', name: 'To Do', color: 'bg-primary' },
                { id: 'progress', name: 'In Progress', color: 'bg-amber-500' },
                { id: 'review', name: 'Review', color: 'bg-sky-500' },
                { id: 'completed', name: 'Completed', color: 'bg-emerald-500' }
            ],
            addSection() {
                let name = prompt('Masukkan nama kolom baru:');
                if (name && name.trim() !== '') {
                    let id = name.toLowerCase().replace(/[^a-z0-9]/g, '-');
                    this.sections.push({ id: id, name: name, color: 'bg-outline-variant' });
                }
            }
        }" class="flex gap-md sm:gap-lg overflow-x-auto pb-md flex-1 items-start snap-x snap-mandatory px-1 h-[calc(100vh-14rem)] w-full custom-scrollbar">

            <template x-for="(section, index) in sections" :key="section.id">
                <div class="kanban-column w-80 shrink-0 flex flex-col max-h-full bg-surface-container-low/60 p-sm rounded-xl border border-outline-variant/40 snap-contained shadow-inner">

                    <div class="flex items-center justify-between px-xs py-sm shrink-0 mb-xs">
                        <div class="flex items-center gap-sm">
                            <span class="w-2 h-2 rounded-full" :class="section.color"></span>
                            <h3 class="font-headline font-semibold text-[15px] text-on-surface tracking-wide" x-text="section.name"></h3>
                        </div>
                        <button class="text-on-surface-variant hover:text-on-surface p-xs transition-colors cursor-pointer">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </div>

                    <div class="flex-1 space-y-sm overflow-y-auto pr-xs custom-scrollbar py-xs h-full min-h-37.5">

                        <div x-show="section.id === 'todo'" class="space-y-sm">
                            @forelse($todoTasks as $task)
                                <x-kanban-card :task="$task" />
                            @empty
                                <p class="text-[11px] text-on-surface-variant/40 text-center py-lg border border-dashed border-outline-variant/20 rounded-xl">No tasks to do</p>
                            @endforelse
                        </div>

                        <div x-show="section.id === 'progress'" class="space-y-sm">
                            @forelse($inProgressTasks as $task)
                                <x-kanban-card :task="$task" />
                            @empty
                                <p class="text-[11px] text-on-surface-variant/40 text-center py-lg border border-dashed border-outline-variant/20 rounded-xl">No tasks in progress</p>
                            @endforelse
                        </div>

                        <div x-show="section.id === 'review'" class="space-y-sm">
                            @forelse($reviewTasks as $task)
                                <x-kanban-card :task="$task" />
                            @empty
                                <p class="text-[11px] text-on-surface-variant/40 text-center py-lg border border-dashed border-outline-variant/20 rounded-xl">No tasks under review</p>
                            @endforelse
                        </div>

                        <div x-show="section.id === 'completed'" class="space-y-sm">
                            @forelse($completedTasks as $task)
                                <x-kanban-card :task="$task" />
                            @empty
                                <p class="text-[11px] text-on-surface-variant/40 text-center py-lg border border-dashed border-outline-variant/30 rounded-xl">No completed tasks</p>
                            @endforelse
                        </div>

                        <div x-show="!['todo', 'progress', 'review', 'completed'].includes(section.id)">
                            <p class="text-[11px] text-on-surface-variant/40 text-center py-lg border border-dashed border-outline-variant/20 rounded-xl">Custom Column Empty</p>
                        </div>

                    </div>
                </div>
            </template>

            <button @click="addSection()"
                class="w-80 shrink-0 flex items-center justify-center gap-sm border-2 border-dashed border-outline-variant/60 rounded-xl group hover:border-primary transition-all h-28 bg-surface-container-low/20 hover:bg-surface-container-low/60 snap-contained cursor-pointer active:scale-98">
                <i class="fa-solid fa-circle-plus text-on-surface-variant group-hover:text-primary text-[15px] transition-colors"></i>
                <span class="text-[12px] font-semibold tracking-wider text-on-surface-variant group-hover:text-primary transition-colors">Add Section</span>
            </button>
        </div>

    </section>

    <a href="{{ route('tugas.create') }}"
        class="fixed bottom-lg right-lg w-14 h-14 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-xl shadow-primary/30 hover:bg-primary/90 active:scale-95 transition-all z-40 cursor-pointer group">
        <i class="fa-solid fa-plus text-[20px] group-hover:rotate-90 transition-transform duration-300"></i>
    </a>

</x-main>
