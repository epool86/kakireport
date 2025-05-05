<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dun;
use App\Models\State;
use App\Models\Parlimen;
use Illuminate\Http\Request;

class DunController extends Controller
{
    public function index()
    {
        $duns = Dun::with(['state', 'parlimen'])->orderBy('code')->paginate(10);
        return view('admin.malaysia.duns.index', compact('duns'));
    }

    public function create()
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        $parlimens = Parlimen::orderBy('code')->pluck('name', 'id');
        return view('admin.malaysia.duns.create', compact('states', 'parlimens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:duns',
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'parlimen_id' => 'required|exists:parlimens,id',
            'electorate_count' => 'nullable|integer',
            'assemblyperson_name' => 'nullable|string|max:255',
            'assemblyperson_party' => 'nullable|string|max:255',
            'last_election_date' => 'nullable|date',
            'creation_date' => 'nullable|date',
            'last_redelineation_date' => 'nullable|date',
        ]);

        Dun::create($validated);

        return redirect()->route('admin.malaysia.duns.index')
            ->with('success', 'State constituency created successfully.');
    }

    public function edit(Dun $dun)
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        $parlimens = Parlimen::orderBy('code')->pluck('name', 'id');
        return view('admin.malaysia.duns.edit', compact('dun', 'states', 'parlimens'));
    }

    public function update(Request $request, Dun $dun)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:duns,code,' . $dun->id,
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'parlimen_id' => 'required|exists:parlimens,id',
            'electorate_count' => 'nullable|integer',
            'assemblyperson_name' => 'nullable|string|max:255',
            'assemblyperson_party' => 'nullable|string|max:255',
            'last_election_date' => 'nullable|date',
            'creation_date' => 'nullable|date',
            'last_redelineation_date' => 'nullable|date',
        ]);

        $dun->update($validated);

        return redirect()->route('admin.malaysia.duns.index')
            ->with('success', 'State constituency updated successfully.');
    }

    public function destroy(Dun $dun)
    {
        $dun->delete();

        return redirect()->route('admin.malaysia.duns.index')
            ->with('success', 'State constituency deleted successfully.');
    }
} 