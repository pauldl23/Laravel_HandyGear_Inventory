@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div id="report" class="main-content" style="margin-left: 5px;">
    <div class="container">
        <h1>Low Stock Report</h1>
        <h3 class="mt-4">Items with Quantity Below 20</h3>

        @if($low_stock_items->isEmpty())
            <p class="text-center mt-3">No low stock items at the moment.</p>
        @else
            <ul class="list-group">
                @foreach($low_stock_items as $item)
                    <li class="list-group-item">
                        <span>{{ $item->product_name }}</span>
                        <span class="badge">{{ $item->product_quantity }} left</span>
                    </li>
                @endforeach
            </ul>
        @endif

        <h3 class="mt-5">Activity Logs</h3>
        @if($logs->isEmpty())
            <p class="text-center mt-3">No logs available.</p>
        @else
            <table class="log-table">
                <thead>
                    <tr>
                       
                        <th>User ID</th>
            
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            
                            <td>{{ $log->user_id }}</td>
                            
                            <td>{{ \Carbon\Carbon::parse($log->timestamp)->format('F j, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
