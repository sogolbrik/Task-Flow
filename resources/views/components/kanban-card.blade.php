@props(['task'])

<div class="bg-surface-container border border-outline-variant p-md rounded-xl shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all cursor-grab active:cursor-grabbing group">
    <div class="flex items-center justify-between gap-sm mb-sm">
        @if ($task->priority === 'Low')
            <span class="px-md py-0.5 rounded-full text-[10px] font-bold tracking-wide border bg-success/10 border-success/30 text-success">Low</span>
        @elseif($task->priority === 'Medium')
            <span class="px-md py-0.5 rounded-full text-[10px] font-bold tracking-wide border bg-amber-500/10 border-amber-500/30 text-amber-500">Medium</span>
        @elseif($task->priority === 'High')
            <span class="px-md py-0.5 rounded-full text-[10px] font-bold tracking-wide border bg-error/10 border-error/30 text-error">High</span>
        @endif

        <div class="opacity-0 group-hover:opacity-100 transition-opacity flex gap-xs">
            <a href="{{ route('tugas.edit', $task->id) }}" class="text-on-surface-variant hover:text-primary p-0.5 text-xs">
                <i class="fa-solid fa-pen"></i>
            </a>
        </div>
    </div>

    <h4 class="font-headline font-semibold text-[13px] text-on-surface tracking-wide mb-xs line-clamp-1">
        {{ $task->task }}
    </h4>

    @if ($task->description)
        <p class="text-[11px] text-on-surface-variant line-clamp-2 mb-md leading-relaxed">
            {{ $task->description }}
        </p>
    @endif

    <div class="h-px bg-outline-variant/30 my-sm"></div>

    <div class="flex items-center justify-between">
        <div class="flex items-center gap-xs text-[10px] text-on-surface-variant font-medium">
            <i class="fa-regular fa-calendar text-[11px]"></i>
            <span>{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</span>
        </div>

        <div class="w-5 h-5 rounded-full border border-primary-container bg-primary-container flex items-center justify-center text-on-primary-container font-extrabold text-[8px]">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
    </div>
</div>
