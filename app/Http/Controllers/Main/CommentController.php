<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CommentRequest;
use App\Models\Comment;
use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Material $material): RedirectResponse
    {
        Comment::create(array_merge($request->validated(), ['user_id' => Auth::user()->id, 'material_id' => $material->id]));
        return to_route('material.show', $material->slug);
    }

    public function destroy(Material $material, Comment $comment): RedirectResponse
    {
        $comment->delete();
        return to_route('material.show', $material->slug);
    }
}
