<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Filter tugas milik user yang jatuh tempo HANYA MINGGU INI
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $allTasks = Task::where('user_id', Auth::id())
            ->whereBetween('due_date', [$startOfWeek, $endOfWeek])
            ->get();

        // Kelompokkan berdasarkan status untuk pemicu awal kolom bawaan
        $tugasByStatus = $allTasks->groupBy('status');

        return view('dashboard', [
            'todoTasks' => $tugasByStatus->get('To Do', collect()),
            'inProgressTasks' => $tugasByStatus->get('In Progress', collect()),
            'reviewTasks' => $tugasByStatus->get('Review', collect()),
            'completedTasks' => $tugasByStatus->get('Completed', collect()),
        ]);
    }
}
