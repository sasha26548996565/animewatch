@extends('layouts.master')

@section('content')
    @foreach ($materials as $material)
        <div class="card">
            <video controls="" src="{{ Storage::url($material->content) }}" style="max-width: 1200px; max-height: 750px;"
                class="bs-card-video"></video>
            <div class="card-body">
                <h5 class="card-title">{{ $material->name }}</h5>
                <p class="card-text">
                    <img src="{{ Storage::url($material->preview) }}" style="max-width: 500px; max-height: 500px;" alt="{{ $material->name }}">
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <br>
    @endforeach

    {{ $materials->withQueryString()->links('vendor.pagination.bootstrap-5') }}
@endsection
