<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $materials = Material::where('name', 'LIKE', '%'. $request->search .'%')->latest()->paginate(10);

        return view('search', compact('materials'));
    }
}
