@extends('layout')

@section('title', 'Item Details')

@section('content')
    <div class="container">
        <h1>Item Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $item->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $item->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $item->price }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $item->quantity }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $item->category ? $item->category->name : 'No Category' }}</td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td>{{ $item->supplier ? $item->supplier->name : 'No Supplier' }}</td>
            </tr>
        </table>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to Items</a>
    </div>
@endsection
