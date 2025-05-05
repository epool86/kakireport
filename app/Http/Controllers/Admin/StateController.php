<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::orderBy('name')->paginate(10);
        return view('admin.malaysia.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.malaysia.states.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capital_city' => 'required|string|max:255',
            'ruler_type' => 'required|in:Sultan,Raja,Yang di-Pertuan Besar,Yang di-Pertuan Agong,Governor,None',
            'ruler_title' => 'nullable|string|max:255',
            'establishment_date' => 'nullable|date',
            'area_sqkm' => 'nullable|numeric',
            'population' => 'nullable|integer',
        ]);

        State::create($validated);

        return redirect()->route('admin.malaysia.states.index')
            ->with('success', 'State created successfully.');
    }

    public function edit(State $state)
    {
        return view('admin.malaysia.states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capital_city' => 'required|string|max:255',
            'ruler_type' => 'required|in:Sultan,Raja,Yang di-Pertuan Besar,Yang di-Pertuan Agong,Governor,None',
            'ruler_title' => 'nullable|string|max:255',
            'establishment_date' => 'nullable|date',
            'area_sqkm' => 'nullable|numeric',
            'population' => 'nullable|integer',
        ]);

        $state->update($validated);

        return redirect()->route('admin.malaysia.states.index')
            ->with('success', 'State updated successfully.');
    }

    public function destroy(State $state)
    {
        // Check if the state has any related records before deleting
        if ($state->districts()->count() > 0 || 
            $state->parlimens()->count() > 0 || 
            $state->duns()->count() > 0 || 
            $state->pbts()->count() > 0) {
            return redirect()->route('admin.malaysia.states.index')
                ->with('error', 'Cannot delete state because it has related records.');
        }

        $state->delete();

        return redirect()->route('admin.malaysia.states.index')
            ->with('success', 'State deleted successfully.');
    }
} 