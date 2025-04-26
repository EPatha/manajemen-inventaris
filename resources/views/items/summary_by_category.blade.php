@extends('layout')

@section('title', 'Summary by Category')

@section('content')
    <div class="container">
        <h1>Summary by Category</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Total Quantity</th>
                    <th>Total Value</th>
                    <th>Average Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->items->first()->total_quantity ?? 0 }}</td>
                        <td>{{ $category->items->first()->total_value ?? 0 }}</td>
                        <td>{{ $category->items->first()->average_price ?? 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
