<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $category = Category::where('slug', $slug)->first();
        $materials = $category->materials()->paginate(10);

        return view('category.show', compact('category', 'materials'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('index');
    }

    public function toggleSubscription(Category $category): RedirectResponse
    {
        $user = Auth::user();
        $user->toggleSubscribe($category);

        return to_route('category.show', $category->slug);
    }
}
