<x-main title="Task Flow | Dashboard">

    <section class="flex-1 overflow-y-auto p-lg space-y-lg flex flex-col">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md shrink-0">
            <div>
                <h2 class="font-headline font-bold text-[34px] leading-10 tracking-tight text-on-surface">Welcome back, John</h2>
                <p class="text-on-surface-variant text-[15px] leading-6 mt-1">You have 12 tasks remaining for this week.</p>
            </div>
            <button
                class="bg-primary-container text-on-primary-container px-lg py-md rounded-lg text-[12px] font-semibold tracking-wider flex items-center gap-sm hover:brightness-110 active:scale-95 transition-all shadow-lg shadow-primary-container/20">
                <i class="fa-solid fa-plus font-bold"></i>
                New Task
            </button>
        </div>

        <div class="flex gap-lg overflow-x-auto pb-md flex-1 items-start">

            <div class="kanban-column w-72 md:w-80 shrink-0 flex flex-col max-h-full bg-surface-container-low/50 p-sm rounded-xl border border-outline-variant/50">
                <div class="flex items-center justify-between px-xs py-sm shrink-0">
                    <div class="flex items-center gap-sm">
                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                        <h3 class="font-headline font-semibold text-[16px] text-on-surface">To Do</h3>
                        <span class="bg-surface-container-highest text-on-surface-variant px-sm py-0.5 rounded-full text-[10px] font-bold">5</span>
                    </div>
                    <button class="text-on-surface-variant hover:text-on-surface p-xs transition-colors"><i class="fa-solid fa-ellipsis"></i></button>
                </div>

                <div class="flex-1 space-y-md overflow-y-auto pr-xs custom-scrollbar py-xs">
                    <div
                        class="bg-surface-container border border-outline-variant p-md rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all cursor-grab active:cursor-grabbing group">
                        <div class="flex justify-between items-start mb-sm">
                            <span class="bg-error-container/20 text-error text-[10px] font-bold px-sm py0.5 rounded uppercase tracking-wider">High</span>
                            <i class="fa-solid fa-grip-vertical text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity text-[12px]"></i>
                        </div>
                        <h4 class="text-on-surface font-headline font-semibold text-[15px] leading-5 mb-xs">Implement API Authentication</h4>
                        <p class="text-on-surface-variant text-[13px] leading-5 mb-md line-clamp-2">Integrate OAuth2 with JWT for secure user session management across the cluster.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-xs text-on-surface-variant text-[11px]">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                <span class="font-medium">Oct 24</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-6 h-6 rounded-full border-2 border-surface-container bg-surface-container-highest flex items-center justify-center text-[10px] font-bold text-on-surface-variant">KA</div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container border border-outline-variant p-md rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all cursor-grab active:cursor-grabbing group">
                        <div class="flex justify-between items-start mb-sm">
                            <span class="bg-secondary-container/20 text-secondary text-[10px] font-bold px-sm py-0.5 rounded uppercase tracking-wider">Low</span>
                            <i class="fa-solid fa-grip-vertical text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity text-[12px]"></i>
                        </div>
                        <h4 class="text-on-surface font-headline font-semibold text-[15px] leading-5 mb-xs">Update Footer Links</h4>
                        <p class="text-on-surface-variant text-[13px] leading-5 mb-md line-clamp-2">Ensure all social media icons point to the correct regional accounts.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-xs text-on-surface-variant text-[11px]">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                <span class="font-medium">Oct 28</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-6 h-6 rounded-full border-2 border-surface-container bg-surface-container-highest flex items-center justify-center text-[10px] font-bold text-on-surface-variant">BI</div>
                                <div
                                    class="w-6 h-6 rounded-full border-2 border-surface-container bg-surface-container-highest flex items-center justify-center text-[8px] font-bold text-on-surface-variant">
                                    +2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kanban-column w-72 md:w-80 shrink-0 flex flex-col max-h-full bg-surface-container-low/50 p-sm rounded-xl border border-outline-variant/50">
                <div class="flex items-center justify-between px-xs py-sm shrink-0">
                    <div class="flex items-center gap-sm">
                        <span class="w-2 h-2 rounded-full bg-secondary"></span>
                        <h3 class="font-headline font-semibold text-[16px] text-on-surface">In Progress</h3>
                        <span class="bg-surface-container-highest text-on-surface-variant px-sm py-0.5 rounded-full text-[10px] font-bold">3</span>
                    </div>
                    <button class="text-on-surface-variant hover:text-on-surface p-xs transition-colors"><i class="fa-solid fa-ellipsis"></i></button>
                </div>

                <div class="flex-1 space-y-md overflow-y-auto pr-xs py-xs">
                    <div
                        class="bg-surface-container border border-primary/40 p-md rounded-xl shadow-md ring-1 ring-primary/10 hover:-translate-y-0.5 transition-all cursor-grab active:cursor-grabbing group">
                        <div class="flex justify-between items-start mb-sm">
                            <span class="bg-tertiary-container/20 text-tertiary text-[10px] font-bold px-sm py-0.5 rounded uppercase tracking-wider">Medium</span>
                            <div class="flex items-center text-primary text-[10px] font-bold animate-pulse">
                                <i class="fa-solid fa-rotate text-[11px] mr-1"></i>
                                ACTIVE
                            </div>
                        </div>
                        <h4 class="text-on-surface font-headline font-semibold text-[15px] leading-5 mb-xs">Design Landing Page</h4>
                        <p class="text-on-surface-variant text-[13px] leading-5 mb-md line-clamp-2">Creating high-fidelity mockups for the new Q4 product launch campaign.</p>
                        <div class="w-full bg-surface-container-low h-1 rounded-full mb-md overflow-hidden">
                            <div class="bg-primary h-full w-[65%]"></div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-xs text-on-surface-variant text-[11px]">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                <span class="font-medium">Oct 21</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-6 h-6 rounded-full border-2 border-surface-container bg-surface-container-highest flex items-center justify-center text-[10px] font-bold text-on-surface-variant">HU</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kanban-column w-72 md:w-80 shrink-0 flex flex-col max-h-full bg-surface-container-low/50 p-sm rounded-xl border border-outline-variant/50">
                <div class="flex items-center justify-between px-xs py-sm shrink-0">
                    <div class="flex items-center gap-sm">
                        <span class="w-2 h-2 rounded-full bg-outline"></span>
                        <h3 class="font-headline font-semibold text-[16px] text-on-surface">Done</h3>
                        <span class="bg-surface-container-highest text-on-surface-variant px-sm py-0.5 rounded-full text-[10px] font-bold">42</span>
                    </div>
                    <button class="text-on-surface-variant hover:text-on-surface p-xs transition-colors"><i class="fa-solid fa-ellipsis"></i></button>
                </div>

                <div class="flex-1 space-y-md overflow-y-auto pr-xs py-xs">
                    <div
                        class="bg-surface-container border border-outline-variant p-md rounded-xl opacity-70 grayscale-[0.2] shadow-sm hover:opacity-100 hover:grayscale-0 transition-all cursor-grab active:cursor-grabbing group">
                        <div class="flex justify-between items-start mb-sm">
                            <span class="bg-outline-variant/20 text-on-surface-variant text-[10px] font-bold px-sm py-0.5 rounded uppercase tracking-wider">Medium</span>
                            <i class="fa-solid fa-circle-check text-secondary text-[16px]"></i>
                        </div>
                        <h4 class="text-on-surface font-headline font-semibold text-[15px] leading-5 mb-xs line-through decoration-on-surface-variant">Market Research</h4>
                        <p class="text-on-surface-variant text-[13px] leading-5 mb-md line-clamp-2">Competitive analysis of task management tools in the developer niche.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-xs text-on-surface-variant text-[11px]">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                <span class="font-medium">Oct 18</span>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-6 h-6 rounded-full border-2 border-surface-container bg-surface-container-highest flex items-center justify-center text-[10px] font-bold text-on-surface-variant">MR</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button
                class="w-72 md:w-80 shrink-0 flex items-center justify-center gap-sm border-2 border-dashed border-outline-variant rounded-xl group hover:border-primary transition-colors h-24 bg-surface-container-low/20 hover:bg-surface-container-low">
                <i class="fa-solid fa-circle-plus text-on-surface-variant group-hover:text-primary text-[16px]"></i>
                <span class="text-[12px] font-semibold tracking-wider text-on-surface-variant group-hover:text-primary">Add Section</span>
            </button>
        </div>

    </section>

    <button
        class="fixed bottom-lg right-lg w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all md:hidden z-50">
        <i class="fa-solid fa-plus text-[20px]"></i>
    </button>

</x-main>
