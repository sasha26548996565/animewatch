<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Material;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $materials = Material::latest()->paginate(10);
        return view('index', compact('materials'));
    }
}
