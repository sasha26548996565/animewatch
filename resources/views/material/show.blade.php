@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $material->name }}</h5>
        </div>
        <div class="card-body">
            <video controls="" src="{{ Storage::url($material->content) }}" style="max-width: 1200px; max-height: 750px;"
                class="bs-card-video"></video>
        </div>
    </div>
@endsection
