<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\MaterialDTO;
use App\Events\MaterialCreated;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialService
{
    public function store(MaterialDTO $material): void
    {
        $material->preview = Storage::disk('public')->put('/previews', $material->preview);
        $material->content = Storage::disk('public')->put('/contents', $material->content);

        $material = Material::create($material->toArray());
        event(new MaterialCreated($material));
    }
}
