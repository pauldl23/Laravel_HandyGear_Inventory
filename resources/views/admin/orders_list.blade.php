@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div id="orders" class="main-content" style="margin-left: 10px;">
    <h2 class="mb-4">Orders / Transactions</h2>

    <div class="table-responsive shadow-sm rounded bg-white p-4">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->transaction_ID }}</td>
                        <td>{{ $order->user_ID ?? 'N/A' }}</td>
                        <td>
                            @if($order->transaction_type == 'Purchase')
                                <span class="badge bg-success">{{ $order->transaction_type }}</span>
                            @elseif($order->transaction_type == 'Return')
                                <span class="badge bg-warning text-dark">{{ $order->transaction_type }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $order->transaction_type }}</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($order->transaction_date)->format('M d, Y') }}</td>
                        <td>{{ $order->product_ID }}</td>
                        <td>{{ $order->quantity_ordered }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
