@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
    <div class="container mt-4">
        <h1>Edit Admin</h1>
        <form action="{{ route('admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Admin</button>
        </form>
    </div>
@endsection
