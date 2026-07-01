<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Auth::user()->tasks();

        // Filter berdasarkan Status
        if (request()->filled('status')) {
            $query->where('status', request()->status);
        }

        // Filter berdasarkan Priority
        if (request()->filled('priority')) {
            $query->where('priority', request()->priority);
        }

        // Sorting
        $sortBy = request()->input('sort_by', 'created_at');
        $sortOrder = request()->input('sort_order', 'desc');

        if (in_array($sortBy, ['task', 'status', 'priority', 'due_date', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $tugas = $query->paginate(10)->withQueryString();

        return view('tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            Auth::user()->tasks()->create($request->validated());

            return redirect()->route('tugas.index')->with('success', 'Task created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create task. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $tugas)
    {
        if ($tugas->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tugas.edit', ['tugas' => $tugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $tugas)
    {
        if ($tugas->user_id !== Auth::id()) {
            abort(403);
        }

        try {
            $tugas->update($request->validated());

            return redirect()->route('tugas.index')->with('success', 'Task updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update this task. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tugas)
    {
        if ($tugas->user_id !== Auth::id()) {
            abort(403);
        }

        try {
            $tugas->delete();

            return redirect()->route('tugas.index')->with('success', 'Task deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Failed to delete task. Please try again.');
        }
    }
}
