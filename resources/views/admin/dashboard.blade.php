@extends('layouts.sidebar')

@section('content')

<div id="dashboard" class="main-content" style="margin-left: 10px";>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <h1>Dashboard</h1>
    <p>Welcome to the HandyGear Inventory System dashboard!</p>

    <div class="dashboard-cards">
       <a href="{{ route('inventory') }}" class="card-link">
            <div class="card blue">
            <h2>Total Inventory Items</h2>
            <p>{{ $total_items }}</p>
            </div>
        </a>
        
        {{-- 
        <div class="card green">
            <h2>Total Categories</h2>
            <p>{{ $total_categories }}</p>
        </div> 
        --}}

        <a href="{{ route('orders') }}" class="card-link">
            <div class="card cyan">
                <h2>Total Orders</h2>
                <p>{{ $total_orders }}</p>
            </div>
        </a>
    </div>

    <div class="dashboard-cards mt-5">
        <div class="card full-width">
            <h2>Low Stock Report</h2>
            <p>Items with Quantity Below 20</p>

            @if($low_stock_items->isEmpty())
                <p class="text-center mt-3">No low stock items at the moment.</p>
            @else
                <div class="low-stock-list mt-3">
                    @foreach($low_stock_items as $item)
                        <div class="low-stock-item">
                            <span class="item-name">{{ $item->product_name }}</span>
                            <span class="item-qty">{{ $item->product_quantity }} left</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
