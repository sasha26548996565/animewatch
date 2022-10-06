<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class MaterialDTO extends DataTransferObject
{
    public string $name;
    public int $category_id;
    public $preview;
    public $content;
}
