@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Admin</h1>
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Admin</button>
        </form>
    </div>
@endsection
