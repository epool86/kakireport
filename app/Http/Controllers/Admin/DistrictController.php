<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with('state')->orderBy('name')->paginate(10);
        return view('admin.malaysia.districts.index', compact('districts'));
    }

    public function create()
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        return view('admin.malaysia.districts.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'area_sqkm' => 'nullable|numeric',
            'population' => 'nullable|integer',
        ]);

        District::create($validated);

        return redirect()->route('admin.malaysia.districts.index')
            ->with('success', 'District created successfully.');
    }

    public function edit(District $district)
    {
        $states = State::orderBy('name')->pluck('name', 'id');
        return view('admin.malaysia.districts.edit', compact('district', 'states'));
    }

    public function update(Request $request, District $district)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'area_sqkm' => 'nullable|numeric',
            'population' => 'nullable|integer',
        ]);

        $district->update($validated);

        return redirect()->route('admin.malaysia.districts.index')
            ->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        // Check if the district has any related PBTs before deleting
        if ($district->pbts()->count() > 0) {
            return redirect()->route('admin.malaysia.districts.index')
                ->with('error', 'Cannot delete district because it has related local authorities.');
        }

        $district->delete();

        return redirect()->route('admin.malaysia.districts.index')
            ->with('success', 'District deleted successfully.');
    }
} 