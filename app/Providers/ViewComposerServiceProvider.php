<?php

namespace App\Providers;

use App\ViewComposers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('includes.header', CategoryComposer::class);
        View::composer('material.create', CategoryComposer::class);
    }
}
