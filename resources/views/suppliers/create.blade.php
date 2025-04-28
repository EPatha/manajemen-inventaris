@extends('layouts.app')

@section('title', 'Tambah/Edit Supplier')

@section('content')
    <div class="container">
        <h1>{{ isset($supplier) ? 'Edit' : 'Tambah' }} Supplier</h1>
        <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST">
            @csrf
            @isset($supplier)
                @method('PUT')
            @endisset

            <div class="mb-3">
                <label for="name" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="contact_info" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" value="{{ old('contact_info', $supplier->contact_info ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-success">{{ isset($supplier) ? 'Update' : 'Simpan' }} Supplier</button>
        </form>

        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Supplier</a>
    </div>
@endsection
