@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Tombol Navigasi -->
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Home</a>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Lihat Items</a>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
        </div>

        <h1>Daftar Kategori</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
