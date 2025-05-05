<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parlimen;
use App\Models\State;
use Illuminate\Http\Request;

class ParlimentController extends Controller
{
    public function index()
    {
        $parlimens = Parlimen::with('state')->orderBy('code')->paginate(10);
        return view('admin.malaysia.parlimens.index', compact('parlimens'));
    }

    public function create()
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        return view('admin.malaysia.parlimens.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:parlimens',
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'electorate_count' => 'nullable|integer',
            'mp_name' => 'nullable|string|max:255',
            'mp_party' => 'nullable|string|max:255',
            'last_election_date' => 'nullable|date',
            'creation_date' => 'nullable|date',
            'last_redelineation_date' => 'nullable|date',
        ]);

        Parlimen::create($validated);

        return redirect()->route('admin.malaysia.parlimens.index')
            ->with('success', 'Parliamentary constituency created successfully.');
    }

    public function edit(Parlimen $parlimen)
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        return view('admin.malaysia.parlimens.edit', compact('parlimen', 'states'));
    }

    public function update(Request $request, Parlimen $parlimen)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:parlimens,code,' . $parlimen->id,
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'electorate_count' => 'nullable|integer',
            'mp_name' => 'nullable|string|max:255',
            'mp_party' => 'nullable|string|max:255',
            'last_election_date' => 'nullable|date',
            'creation_date' => 'nullable|date',
            'last_redelineation_date' => 'nullable|date',
        ]);

        $parlimen->update($validated);

        return redirect()->route('admin.malaysia.parlimens.index')
            ->with('success', 'Parliamentary constituency updated successfully.');
    }

    public function destroy(Parlimen $parlimen)
    {
        // Check if the parlimen has any related DUNs before deleting
        if ($parlimen->duns()->count() > 0) {
            return redirect()->route('admin.malaysia.parlimens.index')
                ->with('error', 'Cannot delete parliamentary constituency because it has related state constituencies.');
        }

        $parlimen->delete();

        return redirect()->route('admin.malaysia.parlimens.index')
            ->with('success', 'Parliamentary constituency deleted successfully.');
    }
} 