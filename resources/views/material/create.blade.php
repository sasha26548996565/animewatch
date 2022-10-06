@extends('layouts.master')

@section('title', 'Создание материала')

@section('content')
    <h2>Создание материала</h2>

    <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" required class="form-control" placeholder="name" value="{{ old('name') }}" id="name">
        </div>
        @include('includes.error', ['fieldName' => 'name'])
        <br>

        <div class="form-group">
            <select name="category_id" class="form-control" required>
                <option value="" disabled>choose category:</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @include('includes.error', ['fieldName' => 'category_id'])
        <br>

        <div class="form-group">
            <label for="preview">Preview image</label>
            <input type="file" class="form-control" name="preview" id="preview" required placeholder="preview">
        </div>
        @include('includes.error', ['fieldName' => 'preview'])
        <br>

        <div class="form-group">
            <label for="content">Content</label>
            <input type="file" name="content" required class="form-control" placeholder="video" id="content">
        </div>
        @include('includes.error', ['fieldName' => 'content'])
        <br>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Создать материал">
        </div>
    </form>
@endsection
