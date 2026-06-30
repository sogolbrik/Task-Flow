<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Workflow::where('user_id', Auth::id());

        // Filter by name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%');
        }

        $workflows = $query->latest()->paginate(10)->withQueryString();
        return view('workflows.index', compact('workflows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workflows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
        ]);

        try {
            $validated['user_id'] = Auth::id();

            Workflow::create($validated);

            return redirect()->route('workflows.index')->with('success', 'Workflow created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create workflow. Please try again.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workflow = Workflow::where('user_id', Auth::id())->findOrFail($id);
        return view('workflows.edit', compact('workflow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $workflow = Workflow::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
        ]);

        try {
            $workflow->update($validated);

            return redirect()->route('workflows.index')->with('success', 'Workflow updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update workflow. Please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workflow = Workflow::where('user_id', Auth::id())->findOrFail($id);
        try {
            $workflow->delete();

            return redirect()->route('workflows.index')->with('success', 'Workflow deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Failed to deleted workflow. Please try again.');
        }
    }
}
