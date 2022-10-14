<?php

declare(strict_types=1);

namespace App\Mail\Category;

use App\Models\Material;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MaterialCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public readonly Material $material;

    public function __construct(Material $material)
    {
        $this->material = $material;
    }

    public function build()
    {
        return $this->markdown('mail.category.material_created', ['material' => $this->material]);
    }
}
