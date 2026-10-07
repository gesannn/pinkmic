<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class AdminStudioController extends Controller
{
    private function rules(): array
    {
        return [
            'name' => 'required|max:150',
            'type' => 'required|max:100',
            'location' => 'required|max:255',
            'description' => 'required',
            'price_per_hour' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|url',
        ];
    }

    public function index()
    {
        return view('admin.studios.index', ['studios' => Studio::latest('id')->get()]);
    }

    public function create()
    {
        return view('admin.studios.form', ['studio' => new Studio]);
    }

    public function store(Request $request)
    {
        Studio::create($request->validate($this->rules()));

        return redirect()->route('admin.studios.index')->with('success', 'Studio ditambahkan.');
    }

    public function edit(Studio $studio)
    {
        return view('admin.studios.form', ['studio' => $studio]);
    }

    public function update(Request $request, Studio $studio)
    {
        $studio->update($request->validate($this->rules()));

        return redirect()->route('admin.studios.index')->with('success', 'Studio diperbarui.');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();

        return back()->with('success', 'Studio dihapus.');
    }
}
