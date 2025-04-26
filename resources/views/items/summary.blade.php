@extends('layout')

@section('title', 'System Summary')

@section('content')
    <div class="container">
        <h1>System Summary</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Total Items</th>
                    <th>Total Value</th>
                    <th>Total Categories</th>
                    <th>Total Suppliers</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalItems }}</td>
                    <td>{{ $totalValue }}</td>
                    <td>{{ $totalCategories }}</td>
                    <td>{{ $totalSuppliers }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
