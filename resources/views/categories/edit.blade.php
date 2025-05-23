@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container">
        <h1>Edit Kategori</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Kategori</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kategori</a>
    </div>
@endsection
