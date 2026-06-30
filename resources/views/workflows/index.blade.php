<x-main title="Workflows">
    <section class="grow p-lg overflow-hidden flex flex-col h-full">
        <div class="mb-lg flex justify-between items-end">
            <div>
                <h2 class="font-headline text-[24px] font-semibold text-on-surface">Workflows</h2>
                <p class="text-[14px] text-on-surface-variant">All your active workflows</p>
            </div>
            <div class="flex gap-sm">
                <form action="{{ route('workflows.index') }}" method="GET" class="flex gap-sm">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search workflows..."
                        class="px-md py-sm bg-surface-container border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:border-primary transition-all">
                    @if (request('search'))
                        <a href="{{ route('workflows.index') }}"
                            class="px-md py-sm bg-surface-container-high text-on-surface rounded-lg text-sm font-semibold flex items-center justify-center border border-outline-variant">Clear</a>
                    @endif
                    <button type="submit"
                        class="px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-sm font-semibold flex items-center gap-xs hover:bg-surface-container-high transition-all">
                        <i class="fa-solid fa-search text-[14px] mr-1"></i>
                        Search
                    </button>
                </form>
                <a href="{{ route('workflows.create') }}"
                    class="px-md py-sm bg-primary text-on-primary rounded-lg text-[12px] font-semibold flex items-center gap-xs shadow-sm hover:brightness-110 transition-all">
                    <i class="fa-solid fa-plus text-[14px] mr-1"></i>
                    New Workflow
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-md p-md bg-primary/10 border border-primary/20 rounded-lg text-primary text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="grow bg-surface-container rounded-xl border border-outline-variant/30 overflow-hidden flex flex-col shadow-lg">
            <div class="overflow-x-auto grow">
                <table class="w-full text-left border-collapse min-w-225">
                    <thead>
                        <tr class="bg-surface-container-high/50 border-b border-outline-variant/20">
                            <th class="py-md px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Workflow Name</th>
                            <th class="py-md px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Description</th>
                            <th class="py-md px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider">Created</th>
                            <th class="py-md px-lg text-[12px] font-semibold text-on-surface-variant uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @foreach ($workflows as $workflow)
                            <tr class="high-density-row transition-colors group hover:bg-primary/5">
                                <td class="py-sm px-lg">
                                    <span class="text-[14px] text-on-surface font-semibold">{{ $workflow->name }}</span>
                                </td>
                                <td class="py-sm px-lg">
                                    <span class="text-[14px] text-on-surface-variant line-clamp-1">{{ $workflow->description ?? 'No description' }}</span>
                                </td>
                                <td class="py-sm px-lg text-[14px] text-on-surface-variant">{{ Carbon\Carbon::parse($workflow->created_at)->format('M d, Y') ?? 'N/A' }}</td>
                                <td class="py-sm px-lg text-right">
                                    <div class="flex items-center justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('workflows.edit', $workflow->id) }}" class="p-1.5 text-on-surface-variant hover:text-primary transition-all">
                                            <i class="fa-solid fa-pen text-[14px]"></i>
                                        </a>
                                        <form id="delete-form-{{ $workflow->id }}" action="{{ route('workflows.destroy', $workflow->id) }}" method="POST" class="inline" x-data="{ openDeleteModal: false }"
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
                                                                <h3 class="text-[16px] font-bold text-on-surface">Delete Workflow?</h3>
                                                                <p class="text-[13px] text-on-surface-variant mt-xs leading-relaxed">
                                                                    Are you sure you want to delete <span class="font-semibold text-primary">"{{ $workflow->name }}"</span>? This action cannot be
                                                                    undone.
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center justify-end gap-sm mt-sm">
                                                            <button type="button" @click="openDeleteModal = false"
                                                                class="px-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-[12px] font-semibold hover:bg-surface-container-high hover:text-on-surface transition-colors">
                                                                Cancel
                                                            </button>

                                                            <button type="button" @click="document.getElementById('delete-form-{{ $workflow->id }}').submit()"
                                                                class="px-md py-sm bg-red-600 text-white font-semibold text-[12px] rounded-lg shadow-md shadow-error/10 hover:brightness-110 transition-all flex items-center gap-xs">
                                                                <i class="fa-solid fa-trash text-[12px]"></i>
                                                                Delete Workflow
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-md bg-surface-container-highest/30 border-t border-outline-variant/20 flex justify-between items-center">
                <div class="text-[12px] text-on-surface-variant font-semibold">
                    Showing <span class="text-on-surface font-bold">{{ $workflows->firstItem() }}</span> to <span class="text-on-surface font-bold">{{ $workflows->lastItem() }}</span> of <span
                        class="text-on-surface font-bold">{{ $workflows->total() }}</span> workflows
                </div>

                @if ($workflows->hasPages())
                    <div class="flex items-center gap-sm">
                        {{-- Previous Page Button --}}
                        @if ($workflows->onFirstPage())
                            <button class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant disabled:opacity-30" disabled>
                                <i class="fa-solid fa-chevron-left text-[12px]"></i>
                            </button>
                        @else
                            <a href="{{ $workflows->previousPageUrl() }}"
                                class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors">
                                <i class="fa-solid fa-chevron-left text-[12px]"></i>
                            </a>
                        @endif

                        <div class="flex gap-xs">
                            {{-- Page Numbers --}}
                            @foreach ($workflows->links()->elements[0] as $page => $url)
                                @if ($page == $workflows->currentPage())
                                    <button class="w-8 h-8 rounded-lg bg-primary text-on-primary text-[12px] font-semibold">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-[12px] font-semibold flex items-center justify-center transition-colors">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Ellipsis --}}
                            @if ($workflows->hasMorePages() && $workflows->lastPage() > $workflows->currentPage() + 3)
                                <span class="px-1 text-on-surface-variant self-center">...</span>
                                <a href="{{ $workflows->url($workflows->lastPage()) }}"
                                    class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-[12px] font-semibold flex items-center justify-center transition-colors">{{ $workflows->lastPage() }}</a>
                            @endif
                        </div>

                        {{-- Next Page Button --}}
                        @if ($workflows->hasMorePages())
                            <a href="{{ $workflows->nextPageUrl() }}" class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors">
                                <i class="fa-solid fa-chevron-right text-[12px]"></i>
                            </a>
                        @else
                            <button class="p-1.5 rounded-lg border border-outline-variant text-on-surface-variant disabled:opacity-30" disabled>
                                <i class="fa-solid fa-chevron-right text-[12px]"></i>
                            </button>
                        @endif
                    </div>
                @endif
            </div>

        </div>
    </section>
</x-main>
