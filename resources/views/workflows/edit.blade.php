<x-main title="Edit Workflow">
    <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[-5%] left-[-5%] w-[30%] h-[30%] bg-secondary/10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="w-full mt-md relative z-10 p-lg overflow-y-auto h-[calc(100vh-4rem)]">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-lg md:mb-xl">
            <div>
                <div class="flex items-center gap-sm text-primary mb-sm">
                    <i class="fa-solid fa-arrow-left text-[14px]"></i>
                    <a class="text-[12px] font-semibold tracking-wider hover:underline" href="{{ route('workflows.index') }}">Back to Workflows</a>
                </div>
                <h2 class="font-headline font-bold text-[24px] sm:text-headline-xl text-on-surface">Edit Workflow</h2>
                <p class="text-on-surface-variant text-[14px] sm:text-body-lg mt-xs sm:mt-sm">Modify details for this workflow.</p>
            </div>
            <div class="flex gap-sm">
                <form id="delete-form-{{ $workflow->id }}" action="{{ route('workflows.destroy', $workflow->id) }}" method="POST" class="inline" x-data="{ openDeleteModal: false }"
                    @submit.prevent="openDeleteModal = true">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-full md:w-auto justify-center px-md py-sm rounded-lg border border-error/50 text-error text-[12px] font-semibold tracking-wider flex items-center gap-xs hover:bg-error/10 transition-colors active:scale-95">
                        <i class="fa-solid fa-trash-can text-[14px]"></i>
                        Delete Workflow
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

                {{-- <form action="{{ route('workflows.destroy', $workflow->id) }}" method="POST" onsubmit="return confirm('Delete this workflow permanently?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-md py-sm border border-error/30 bg-error/5 text-error rounded-lg text-sm font-semibold hover:bg-error/10 transition-all flex items-center gap-sm">
                        <i class="fa-regular fa-trash-can"></i> Delete Workflow
                    </button>
                </form> --}}
            </div>
        </div>

        <form action="{{ route('workflows.update', $workflow->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-md sm:gap-lg">
            @csrf
            @method('PUT')

            <div class="md:col-span-8 space-y-md sm:space-y-lg">
                <div class="glass-effect p-lg rounded-xl border border-outline-variant/50 space-y-sm">
                    <label for="name" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Workflow Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $workflow->name) }}" required
                        class="w-full bg-transparent text-headline-sm font-semibold text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none" placeholder="e.g., Onboarding Flow">
                    @error('name')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="glass-effect p-lg rounded-xl border border-outline-variant/50 space-y-sm">
                    <label for="description" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Description <small
                            class="text-on-surface-variant/60">(optional)</small></label>
                    <textarea id="description" name="description" rows="6"
                        class="w-full bg-transparent text-body-lg text-on-surface placeholder:text-on-surface-variant/40 focus:outline-none resize-none leading-relaxed" placeholder="Describe what this workflow does...">{{ old('description', $workflow->description) }}</textarea>
                    @error('description')
                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:col-span-4 space-y-md sm:space-y-lg">
                <div class="glass-effect p-lg rounded-xl space-y-md border border-outline-variant/50">
                    <div class="space-y-sm">
                        <label for="steps" class="text-[12px] font-semibold tracking-wider text-on-surface-variant uppercase block">Steps</label>
                        <div id="steps-container" class="space-y-sm">
                            @if (old('steps'))
                                @foreach (old('steps') as $step)
                                    <div class="flex gap-sm items-center">
                                        <input type="text" name="steps[]" value="{{ is_array($step) ? implode(', ', $step) : $step }}"
                                            class="flex-1 bg-surface-container/50 border border-outline-variant rounded-lg px-md py-sm text-sm text-on-surface focus:outline-none transition-all color-scheme-dark"
                                            placeholder="Enter step...">
                                        <button type="button" class="remove-step p-sm text-error hover:bg-error/10 rounded-lg transition-all">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                @if (isset($workflow->steps) && is_array($workflow->steps))
                                    @foreach ($workflow->steps as $step)
                                        <div class="flex gap-sm items-center">
                                            <input type="text" name="steps[]" value="{{ is_array($step) ? implode(', ', $step) : $step }}"
                                                class="flex-1 bg-surface-container/50 border border-outline-variant rounded-lg px-md py-sm text-sm text-on-surface focus:outline-none transition-all color-scheme-dark"
                                                placeholder="Enter step...">
                                            <button type="button" class="remove-step p-sm text-error hover:bg-error/10 rounded-lg transition-all">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-sm items-center">
                                        <input type="text" name="steps[]"
                                            class="flex-1 bg-surface-container/50 border border-outline-variant rounded-lg px-md py-sm text-sm text-on-surface focus:outline-none transition-all color-scheme-dark"
                                            placeholder="Enter step...">
                                        <button type="button" class="remove-step p-sm text-error hover:bg-error/10 rounded-lg transition-all">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <button type="button" id="add-step"
                            class="w-full mt-md py-sm border border-outline-variant text-on-surface-variant rounded-lg text-sm font-semibold flex items-center justify-center gap-xs hover:bg-surface-container transition-all">
                            <i class="fa-solid fa-plus"></i> Add Step
                        </button>
                    </div>

                    <div class="pt-md border-t border-outline-variant/30 flex flex-col gap-sm">
                        <button type="submit"
                            class="w-full py-md bg-primary text-on-primary rounded-xl font-semibold tracking-wide hover:brightness-110 active:scale-[0.99] transition-all shadow-lg shadow-primary/20">
                            Update Workflow
                        </button>
                        <a href="{{ route('workflows.index') }}"
                            class="w-full py-md border border-outline-variant text-on-surface hover:bg-surface-container rounded-xl font-semibold tracking-wide text-center active:scale-[0.99] transition-all">
                            Cancel
                        </a>
                    </div>
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
        // Step management
        const addStepBtn = document.getElementById('add-step');
        const stepsContainer = document.getElementById('steps-container');

        addStepBtn.addEventListener('click', function() {
            const newStepDiv = document.createElement('div');
            newStepDiv.className = 'flex gap-sm items-center';
            newStepDiv.innerHTML = `
                <input type="text" name="steps[]"
                       class="flex-1 bg-surface-container/50 border border-outline-variant rounded-lg px-md py-sm text-sm text-on-surface focus:outline-none transition-all color-scheme-dark"
                       placeholder="Enter step...">
                <button type="button" class="remove-step p-sm text-error hover:bg-error/10 rounded-lg transition-all">
                    <i class="fa-solid fa-trash"></i>
                </button>
            `;
            stepsContainer.appendChild(newStepDiv);
        });

        stepsContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-step')) {
                const stepDiv = e.target.closest('.remove-step').closest('div');
                if (stepsContainer.querySelectorAll('div').length > 1) {
                    stepDiv.remove();
                }
            }
        });
    </script>
</x-main>
