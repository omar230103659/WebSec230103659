@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product List</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @if(Auth::user()->role === 'Customer')
    <form action="{{ route('products.buy', $product) }}" method="POST" style="display:inline;">
        @csrf
        <button class="btn btn-sm btn-success">Buy</button>
    </form>
@endif
<p><strong>Your Credit:</strong> ${{ Auth::user()->credit }}</p>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th><th>Price</th><th>Quantity</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
