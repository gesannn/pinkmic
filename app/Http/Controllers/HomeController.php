<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $type = trim((string) $request->query('type', ''));

        $studios = Studio::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('name', 'like', "%{$q}%")
                      ->orWhere('location', 'like', "%{$q}%");
                });
            })
            ->when($type !== '', fn ($query) => $query->where('type', $type))
            ->latest('id')
            ->get();

        $types = Studio::query()->distinct()->orderBy('type')->pluck('type');

        return view('home', compact('studios', 'types', 'q', 'type'));
    }

    public function show(Studio $studio)
    {
        return view('studio.show', compact('studio'));
    }
}
