<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materials(): Relation
    {
        return $this->hasMany(Material::class, 'category_id', 'id');
    }
}
