<x-main title="Lists Task">
    <section class="grow p-md sm:p-lg overflow-hidden flex flex-col h-full w-full">

        <div class="mb-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-md">
            <div>
                <h2 class="font-headline text-[22px] sm:text-[24px] font-semibold text-on-surface">Task Index</h2>
                <p class="text-[13px] sm:text-[14px] text-on-surface-variant">All active tasks across your workspaces</p>
            </div>

            <div class="flex flex-wrap items-center gap-sm w-full md:w-auto">
                <div class="relative group flex-1 sm:flex-initial">
                    <button
                        class="w-full justify-center px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-[12px] font-semibold flex items-center gap-xs hover:bg-surface-container-high transition-colors">
                        <i class="fa-solid fa-filter text-[14px] mr-1"></i>
                        Filter {{ request('status') || request('priority') ? '(Active)' : '' }}
                    </button>
                    <div
                        class="absolute right-0 md:right-auto md:left-0 mt-1 w-48 bg-surface-container border border-outline-variant rounded-lg shadow-xl hidden group-focus-within:block group-hover:block z-50 text-left">
                        <div class="p-2 text-[11px] font-bold uppercase text-on-surface-variant/60 tracking-wider">Status</div>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'To Do']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('status') === 'To Do' ? 'font-bold text-primary' : '' }}">To Do</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'In Progress']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('status') === 'In Progress' ? 'font-bold text-primary' : '' }}">In Progress</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'Review']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('status') === 'Review' ? 'font-bold text-primary' : '' }}">In Review</a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'Completed']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('status') === 'Completed' ? 'font-bold text-primary' : '' }}">Done</a>

                        <div class="border-t border-outline-variant/30 my-1"></div>
                        <div class="p-2 text-[11px] font-bold uppercase text-on-surface-variant/60 tracking-wider">Priority</div>
                        <a href="{{ request()->fullUrlWithQuery(['priority' => 'High']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('priority') === 'High' ? 'font-bold text-primary' : '' }}">High</a>
                        <a href="{{ request()->fullUrlWithQuery(['priority' => 'Medium']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('priority') === 'Medium' ? 'font-bold text-primary' : '' }}">Medium</a>
                        <a href="{{ request()->fullUrlWithQuery(['priority' => 'Low']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('priority') === 'Low' ? 'font-bold text-primary' : '' }}">Low</a>

                        @if (request()->has('status') || request()->has('priority'))
                            <div class="border-t border-outline-variant/30 my-1"></div>
                            <a href="{{ route('tugas.index') }}" class="block px-md py-sm text-[12px] text-center text-error font-semibold hover:bg-error/10">Reset Filter</a>
                        @endif
                    </div>
                </div>

                <div class="relative group flex-1 sm:flex-initial">
                    <button
                        class="w-full justify-center px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-[12px] font-semibold flex items-center gap-xs hover:bg-surface-container-high transition-colors">
                        <i class="fa-solid fa-sort text-[14px] mr-1"></i>
                        Sort By
                    </button>
                    <div class="absolute right-0 mt-1 w-48 bg-surface-container border border-outline-variant rounded-lg shadow-xl hidden group-focus-within:block group-hover:block z-50 text-left">
                        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'due_date', 'sort_order' => 'asc']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('sort_by') === 'due_date' && request('sort_order') === 'asc' ? 'font-bold text-primary' : '' }}">Due
                            Date (Earliest)</a>
                        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'due_date', 'sort_order' => 'desc']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('sort_by') === 'due_date' && request('sort_order') === 'desc' ? 'font-bold text-primary' : '' }}">Due
                            Date (Latest)</a>
                        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'task', 'sort_order' => 'asc']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('sort_by') === 'task' ? 'font-bold text-primary' : '' }}">Task Title (A-Z)</a>
                        <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => 'desc']) }}"
                            class="block px-md py-xs text-[13px] text-on-surface hover:bg-primary/10 {{ request('sort_by') === 'created_at' || !request('sort_by') ? 'font-bold text-primary' : '' }}">Newest
                            Created</a>
                    </div>
                </div>

                <a href="{{ route('tugas.create') }}"
                    class="w-full sm:w-auto justify-center px-md py-sm bg-primary text-on-primary rounded-lg text-[12px] font-semibold flex items-center gap-xs shadow-sm hover:brightness-110 transition-all">
                    <i class="fa-solid fa-plus text-[14px] mr-1"></i>
                    New Task
                </a>
            </div>
        </div>

        <div class="grow bg-surface-container rounded-xl border border-outline-variant/30 overflow-hidden flex flex-col shadow-lg w-full">
            <div class="overflow-x-auto grow w-full -mb-px">
                <table class="w-full text-left border-collapse min-w-160">
                    <thead>
                        <tr class="bg-surface-container-high/50 border-b border-outline-variant/20">
                            <th class="py-md px-md sm:px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">
                                <div class="flex items-center gap-xs cursor-pointer">
                                    Task Title
                                </div>
                            </th>
                            <th class="py-md px-md sm:px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Status</th>
                            <th class="py-md px-md sm:px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Priority</th>
                            <th class="py-md px-md sm:px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Due Date</th>
                            <th class="py-md px-md sm:px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @forelse($tugas as $task)
                            <tr class="high-density-row transition-colors group hover:bg-primary/5">
                                <td class="py-sm px-md sm:px-lg">
                                    <span class="text-[14px] text-on-surface font-semibold {{ $task->status === 'done' ? 'line-through text-on-surface-variant' : '' }}">
                                        {{ $task->task }}
                                    </span>
                                </td>
                                <td class="py-sm px-md sm:px-lg">
                                    @if ($task->status === 'In Progress')
                                        <span class="inline-flex items-center px-sm py-xs rounded-full bg-secondary-container/10 text-secondary text-[11px] border border-secondary/20 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2"></span>
                                            In Progress
                                        </span>
                                    @elseif($task->status === 'To Do')
                                        <span
                                            class="inline-flex items-center px-sm py-xs rounded-full bg-outline-variant/10 text-on-surface-variant text-[11px] border border-outline-variant/20 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-outline-variant mr-2"></span>
                                            To Do
                                        </span>
                                    @elseif($task->status === 'Review')
                                        <span class="inline-flex items-center px-sm py-xs rounded-full bg-tertiary-container/10 text-tertiary text-[11px] border border-tertiary/20 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-tertiary mr-2"></span>
                                            In Review
                                        </span>
                                    @elseif($task->status === 'Completed')
                                        <span class="inline-flex items-center px-sm py-xs rounded-full bg-primary/10 text-primary text-[11px] border border-primary/20 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2"></span>
                                            Done
                                        </span>
                                    @endif
                                </td>
                                <td class="py-sm px-md sm:px-lg">
                                    @if ($task->priority === 'High')
                                        <span class="inline-flex items-center text-error text-[12px] font-bold">
                                            <i class="fa-solid fa-triangle-exclamation mr-1 text-[12px]"></i>
                                            High
                                        </span>
                                    @elseif($task->priority === 'Medium')
                                        <span class="inline-flex items-center text-tertiary text-[12px] font-bold">
                                            <i class="fa-solid fa-bars mr-1 text-[12px]"></i>
                                            Medium
                                        </span>
                                    @elseif($task->priority === 'Low')
                                        <span class="inline-flex items-center text-success text-[12px] font-bold">
                                            <i class="fa-solid fa-arrow-down mr-1 text-[12px]"></i>
                                            Low
                                        </span>
                                    @endif
                                </td>
                                <td class="py-sm px-md sm:px-lg text-[14px] text-on-surface-variant">
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </td>
                                <td class="py-sm px-md sm:px-lg text-right">
                                    <div class="flex items-center justify-end gap-sm md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('tugas.edit', $task) }}" class="p-1.5 text-on-surface-variant hover:text-primary transition-colors">
                                            <i class="fa-solid fa-pen text-[14px]"></i>
                                        </a>
                                        <form id="delete-form-{{ $task->id }}" action="{{ route('tugas.destroy', $task->id) }}" method="POST" class="inline" x-data="{ openDeleteModal: false }"
                                            @submit.prevent="openDeleteModal = true">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="p-1.5 text-on-surface-variant hover:text-error transition-colors">
                                                <i class="fa-solid fa-trash text-[14px]"></i>
                                            </button>

                                            <template x-teleport="body">
                                                <div x-show="openDeleteModal" class="fixed inset-0 z-100 flex items-center justify-center p-md overflow-x-hidden overflow-y-auto" x-cloak>

                                                    <div x-show="openDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                                        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                                        @click="openDeleteModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

                                                    <div x-show="openDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                                                        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                                                        x-transition:leave-end="opacity-0 scale-95"
                                                        class="relative w-full max-w-md bg-surface-container border border-outline-variant/20 rounded-2xl p-lg shadow-2xl flex flex-col gap-md text-left mx-md">

                                                        <div class="flex items-start gap-md">
                                                            <div class="w-10 h-10 rounded-xl bg-error/20 flex items-center justify-center text-error shrink-0 border border-error/30">
                                                                <i class="fa-solid fa-triangle-exclamation text-[18px]"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="text-[16px] font-bold text-on-surface">Delete Task?</h3>
                                                                <p class="text-[13px] text-on-surface-variant mt-xs leading-relaxed">
                                                                    Are you sure you want to delete <span class="font-semibold text-primary">"{{ $task->task }}"</span>? This action cannot be
                                                                    undone.
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center justify-end gap-sm mt-sm">
                                                            <button type="button" @click="openDeleteModal = false"
                                                                class="px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-[12px] font-semibold hover:bg-surface-container-high hover:text-on-surface transition-colors">
                                                                Cancel
                                                            </button>

                                                            <button type="button" @click="document.getElementById('delete-form-{{ $task->id }}').submit()"
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
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-lg px-md sm:px-lg text-center text-on-surface-variant text-[14px]">
                                    No active tasks found. Create your first task to get started.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($tugas->hasPages())
                <div class="p-md bg-surface-container-highest/30 border-t border-outline-variant/20 flex flex-col sm:flex-row justify-between items-center gap-sm">
                    <div class="text-[12px] text-on-surface-variant font-semibold text-center sm:text-left">
                        Showing <span class="text-on-surface font-bold">{{ $tugas->firstItem() }}</span> to <span class="text-on-surface font-bold">{{ $tugas->lastItem() }}</span> of <span
                            class="text-on-surface font-bold">{{ $tugas->total() }}</span> tasks
                    </div>
                    <div class="flex items-center gap-sm">
                        {{-- Previous Page Button --}}
                        @if ($tugas->onFirstPage())
                            <button class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high disabled:opacity-30" disabled>
                                <i class="fa-solid fa-chevron-left text-[12px]"></i>
                            </button>
                        @else
                            <a href="{{ $tugas->previousPageUrl() }}"
                                class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors">
                                <i class="fa-solid fa-chevron-left text-[12px]"></i>
                            </a>
                        @endif

                        <div class="flex gap-xs">
                            {{-- Page Numbers --}}
                            @foreach ($tugas->links()->elements[0] as $page => $url)
                                @if ($page == $tugas->currentPage())
                                    <button class="w-8 h-8 rounded-lg bg-primary text-on-primary text-[12px] font-semibold">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-[12px] font-semibold flex items-center justify-center transition-colors">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Ellipsis --}}
                            @if ($tugas->hasMorePages() && $tugas->lastPage() > $tugas->currentPage() + 3)
                                <span class="px-1 text-on-surface-variant self-center">...</span>
                                <a href="{{ $tugas->url($tugas->lastPage()) }}"
                                    class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-[12px] font-semibold flex items-center justify-center transition-colors">{{ $tugas->lastPage() }}</a>
                            @endif
                        </div>

                        {{-- Next Page Button --}}
                        @if ($tugas->hasMorePages())
                            <a href="{{ $tugas->nextPageUrl() }}" class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors">
                                <i class="fa-solid fa-chevron-right text-[12px]"></i>
                            </a>
                        @else
                            <button class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high disabled:opacity-30" disabled>
                                <i class="fa-solid fa-chevron-right text-[12px]"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi Row Klik
            document.querySelectorAll('.high-density-row').forEach(row => {
                row.addEventListener('click', (e) => {
                    if (e.target.closest('button') || e.target.closest('.task-checkbox') || e.target.closest('a') || e.target.closest('form')) return;
                    row.classList.add('bg-primary-container/10');
                    setTimeout(() => row.classList.remove('bg-primary-container/10'), 300);
                });
            });

            // Toggle Interaksi Simpel Checkbox
            document.querySelectorAll('.task-checkbox').forEach(checkbox => {
                checkbox.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const icon = this.querySelector('i');
                    if (icon) {
                        this.innerHTML = '';
                        this.classList.remove('bg-primary', 'text-on-primary');
                        this.classList.add('border-2', 'border-outline');
                        this.nextElementSibling?.classList.remove('line-through', 'text-on-surface-variant');
                        this.nextElementSibling?.classList.add('text-on-surface');
                    } else {
                        this.innerHTML = '<i class="fa-solid fa-check text-[11px]"></i>';
                        this.classList.add('bg-primary', 'text-on-primary');
                        this.classList.remove('border-2', 'border-outline');
                        this.nextElementSibling?.classList.add('line-through', 'text-on-surface-variant');
                        this.nextElementSibling?.classList.remove('text-on-surface');
                    }
                });
            });
        });
    </script>
</x-main>
