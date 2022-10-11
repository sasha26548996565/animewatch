@extends('layouts.master')

@section('content')
    <h2>По вашему запросу "{{ $_GET['search'] }}"найдено:</h2>
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
