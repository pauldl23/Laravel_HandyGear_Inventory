@extends('layouts.sidebar')

@section('content')

<div id="dashboard" class="main-content" style="margin-left: 50px;">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h1>Dashboard</h1>
    <p>Welcome to the Inventory Management System dashboard!</p>

    <div class="dashboard-cards">
        <div class="card blue">
            <h2>Total Inventory Items</h2>
            <p>{{ $total_items }}</p>
        </div>
        <div class="card green">
            <h2>Total Categories</h2>
            <p>{{ $total_categories }}</p>
        </div>
        <div class="card cyan">
            <h2>Total Orders</h2>
            <p>{{ $total_orders }}</p>
        </div>
    </div>
</div>
@endsection
