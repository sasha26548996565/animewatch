@extends('layouts.master')

@section('title', 'Категория '. $category->name)

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Категория {{ $category->name }}</h2>
        @role('admin')
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" class="btn btn-danger" value="Удалить категорию">
            </form>
            <br>
        @endrole

        <form action="{{ route('category.toggleSubscription', $category->id) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-success" value="{{ auth()->user()->hasSubscribed($category) ? 'отписаться' : 'подписаться' }}">
        </form>
    </div>
    @foreach ($materials as $material)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $material->name }}</h5>
                <p class="card-text">
                    <img src="{{ Storage::url($material->preview) }}" style="max-width: 500px; max-height: 500px;" alt="{{ $material->name }}">
                </p>
                <a href="{{ route('material.show', $material->slug) }}" class="btn btn-primary">Смотреть</a>
            </div>
        </div>
        <br>
    @endforeach

    {{ $materials->withQueryString()->links('vendor.pagination.bootstrap-5') }}
@endsection
