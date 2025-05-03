@extends('layouts.sidebar')

@section('content')
<div id="products-page" class="main-content" style="margin-left: 50px;">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <h1>Items</h1>

    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search by product name or ID" value="{{ old('search', $search ?? '') }}">
        <button type="submit" class="btn">Search</button>
    </form>

    <table class="product-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product ID</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_ID }}</td>
                    <td>{{ number_format($product->product_price, 2) }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>{{ $product->product_category }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
