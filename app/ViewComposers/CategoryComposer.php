<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Category;
use App\ViewComposers\Contracts\ViewComposerContract;
use Illuminate\Contracts\View\View;

class CategoryComposer implements ViewComposerContract
{
    public function compose(View $view): View
    {
        return $view->with('categories', Category::latest()->get());
    }
}
