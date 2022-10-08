<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;

class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments(): Relation
    {
        return $this->hasMany(Comment::class, 'material_id', 'id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($material) {
            $material->slug = Str::slug($material->name) . now()->format('YmdHis');
        });
    }
}
