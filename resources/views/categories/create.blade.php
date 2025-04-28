@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="container">
        <h1>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h1>
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @isset($category)
                @method('PUT')
            @endisset

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">{{ isset($category) ? 'Update' : 'Simpan' }} Kategori</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kategori</a>
    </div>
@endsection
