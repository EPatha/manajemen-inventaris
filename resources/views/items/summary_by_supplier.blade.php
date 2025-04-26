@extends('layout')

@section('title', 'Summary by Supplier')

@section('content')
    <div class="container">
        <h1>Summary by Supplier</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Total Quantity</th>
                    <th>Total Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->items->first()->total_quantity ?? 0 }}</td>
                        <td>{{ $supplier->items->first()->total_value ?? 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
