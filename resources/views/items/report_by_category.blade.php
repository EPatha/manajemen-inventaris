@extends('layout')

@section('title', 'Report by Category')

@section('content')
    <div class="container">
        <h1>Report by Category</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    @foreach($category->items as $item)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
