<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Only fetch tasks belonging to the currently authenticated user
        $query = Task::where('user_id', Auth::id());

        // --- 1. FITUR FILTER ---
        // Filter berdasarkan Status
        $query->when($request->filled('status'), function ($q) use ($request) {
            return $q->where('status', $request->status);
        });

        // Filter berdasarkan Priority
        $query->when($request->filled('priority'), function ($q) use ($request) {
            return $q->where('priority', $request->priority);
        });


        // --- 2. FITUR SORT (PENGURUTAN) ---
        $sortBy = $request->input('sort_by', 'created_at'); // Default urut berdasarkan tgl dibuat
        $sortOrder = $request->input('sort_order', 'desc'); // Default descending (terbaru)

        // Validasi kolom agar aman dari SQL Injection
        if (in_array($sortBy, ['task', 'status', 'priority', 'due_date', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        // --- 3. PAGINASI DENGAN QUERY STRING ---
        // Menggunakan appends() agar filter tidak hilang saat pindah halaman paginasi
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            'task' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:To Do,In Progress,Review,Completed',
            'priority' => 'required|in:Low,Medium,High',
            'due_date' => 'required|date',
        ]);

        $validate['user_id'] = Auth::id();

        Task::create($validate);
        return redirect()->route('tugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tugas.edit', [
            'tugas' => Task::where('user_id', Auth::id())->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'task' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:To Do,In Progress,Review,Completed',
            'priority' => 'required|in:Low,Medium,High',
            'due_date' => 'required|date',
        ]);

        Task::findOrFail($id)->update($validate);
        return redirect()->route('tugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the task that belongs to the authenticated user
        $tugas = Task::where('user_id', Auth::id())->findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index');
    }
}
