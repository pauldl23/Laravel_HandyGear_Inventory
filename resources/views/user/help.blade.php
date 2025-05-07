@extends('layouts.sidebar')


@section('content')
<div id="help-support-page" class="main-content" style="margin-left: 5px;">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container mt-5">
        <!-- Page Title -->
        <h1 class="text-center mb-5 custom-heading">Help & Support</h1>

        <!-- Contact Support Section -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card custom-card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Contact Support</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> support@hardwareinventory.com</p>
                        <p><strong>Phone:</strong> +1-800-555-1234</p>
                        <p><strong>Address:</strong> HG Hardware Store, La Salle Avenue, Bacolod, Philippines</p>
                        <p><strong>Working Hours:</strong> Monday - Friday, 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection