@extends('layouts.app')

@section('content')
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
        <button type="submit" class="btn btn-success">{{ isset($category) ? 'Perbarui' : 'Simpan' }}</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
