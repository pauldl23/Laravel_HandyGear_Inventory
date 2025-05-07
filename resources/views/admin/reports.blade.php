@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div id="report" class="main-content" style="margin-left: 5px;">
<div class="container">
    <h1>Activity Logs</h1>

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
