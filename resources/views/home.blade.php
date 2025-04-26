@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container mt-4">
        <h1>Welcome to the Home Page</h1>
        <p>This is the landing page of your Laravel application!</p>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('items.index') }}" class="btn btn-primary btn-block">Go to Items</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('categories.index') }}" class="btn btn-success btn-block">Go to Categories</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('suppliers.index') }}" class="btn btn-warning btn-block">Go to Suppliers</a>
            </div>
        </div>
    </div>
@endsection
