<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\DTO\MaterialDTO;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Main\MaterialRequest;
use App\Services\MaterialService;

class MaterialController extends Controller
{
    private MaterialService $materialService;

    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }

    public function create(): View
    {
        $categories = Category::latest()->get();
        return view('material.create', compact('categories'));
    }

    public function store(MaterialRequest $request): RedirectResponse
    {
        $this->materialService->store(new MaterialDTO($request->validated()));
        return to_route('index');
    }
}
