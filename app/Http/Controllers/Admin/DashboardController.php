<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $allTasks = $user->tasks()
            ->whereBetween('due_date', [$startOfWeek, $endOfWeek])
            ->select('id', 'user_id', 'task', 'description', 'status', 'priority', 'due_date', 'created_at', 'updated_at')
            ->get()
            ->groupBy('status');

        return view('dashboard', [
            'todoTasks' => $allTasks->get('To Do', collect()),
            'inProgressTasks' => $allTasks->get('In Progress', collect()),
            'reviewTasks' => $allTasks->get('Review', collect()),
            'completedTasks' => $allTasks->get('Completed', collect()),
        ]);
    }
}
