@extends('layouts.sidebar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div id="inventory" class="main-content" style="margin-left: 50px;">
    <h1>Inventory Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="form-container">
        <h2>Add New Product</h2>
        <form method="post" action="{{ route('inventory.add') }}">
            @csrf
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="text" name="product_id" placeholder="Product ID" required>
            <input type="number" step="0.01" name="product_price" placeholder="Price" required>
            <input type="number" name="product_quantity" placeholder="Quantity" required>

            <select name="product_category" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-search">Add Product</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product ID</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr id="row-{{ $item->product_ID }}">
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_ID }}</td>
                    <td>{{ $item->product_price }}</td>
                    <td>{{ $item->product_quantity }}</td>
                    <td>{{ $item->product_category }}</td>
                    <td>
                        <form method="post" action="{{ route('inventory.adjust', $item->product_ID) }}" style="display:inline;">
                            @csrf
                            <input type="number" name="quantity_change" placeholder="Qty" required style="width: 60px;">
                            <button type="submit" name="adjust_quantity" value="add" class="btn btn-success">+</button>
                            <button type="submit" name="adjust_quantity" value="subtract" class="btn btn-danger">-</button>
                        </form>

                        <button class="btn btn-warning" onclick="toggleEditForm('{{ $item->product_ID }}')">Edit</button>

                        <form method="post" action="{{ route('inventory.delete', $item->product_ID) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                <tr id="edit-row-{{ $item->product_ID }}" class="edit-row" style="display: none;">
                    <td colspan="6">
                        <form method="post" action="{{ route('inventory.edit', $item->product_ID) }}">
                            @csrf
                            <input type="text" name="product_name" value="{{ $item->product_name }}" required>
                            <input type="text" name="product_id" value="{{ $item->product_ID }}" required>
                            <input type="number" step="0.01" name="product_price" value="{{ $item->product_price }}" required>

                            <select name="product_category" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" {{ $category == $item->product_category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="toggleEditForm('{{ $item->product_ID }}')">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleEditForm(id) {
        const editRow = document.getElementById(`edit-row-${id}`);
        editRow.style.display = editRow.style.display === 'none' ? '' : 'none';
    }
</script>

@endsection
