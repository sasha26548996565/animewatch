<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\MaterialDTO;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialService
{
    public function store(MaterialDTO $material): void
    {
        $material->preview = Storage::disk('public')->put('/previews', $material->preview);
        $material->content = Storage::disk('public')->put('/contents', $material->content);

        Material::create($material->toArray());
    }
}
