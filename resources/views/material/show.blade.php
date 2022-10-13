@extends('layouts.master')

@section('content')
    @if (auth()->user()->id == $material->user_id || auth()->user()->hasRole('admin'))
        <form action="{{ route('material.destroy', $material->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <input type="submit" class="btn btn-danger" value="Удалить материал">
        </form>
        <br>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $material->name }}</h5>
        </div>
        <div class="card-body">
            <video controls="" src="{{ Storage::url($material->content) }}" style="max-width: 1200px; max-height: 750px;"
                class="bs-card-video"></video>
        </div>
    </div>

    <h4>Comments</h4>

    @auth
        <form action="{{ route('comment.store', $material->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="text" class="form-control" required placeholder="text" value="{{ old('text') }}">
            </div>
            <br>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Добавить комментарий">
            </div>
        </form>
    @else
        <span class="alert alert-danger">Зарегкстрируйтесь чтобы оставить комментарий
            <a href="{{ route('register') }}">Зарегестрироваться</a> |
            <a href="{{ route('login') }}">Войти</a>
        </span>
    @endauth

    @foreach ($material->comments as $comment)
        <p>{{ $comment->user->email }}</p>
        <p>{{ $comment->text }}</p>
        @if ($comment->user->id == auth()->user()->id || auth()->user()->isAdmin())
            <form action="{{ route('comment.destroy', [$material->id, $comment->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" class="btn btn-danger" value="Удалить комментарий">
            </form>
        @endif
        <hr>
    @endforeach
@endsection
