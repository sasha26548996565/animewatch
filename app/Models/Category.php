<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelSubscribe\Traits\Subscribable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Subscribable;

    protected $guarded = [];

    public function materials(): Relation
    {
        return $this->hasMany(Material::class, 'category_id', 'id');
    }
}
