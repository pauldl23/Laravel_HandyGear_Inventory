<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const currentPage = window.location.pathname.split('/').pop();
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href').includes(currentPage)) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" id="sidebar-admin-user">
        <div class="logo" id="logo">HandyGear System</div>
        <nav id="sidebar-nav">
            <ul id="sidebar-menu">
                @php $usertype = session('usertype', 'Admin'); @endphp
                @if($usertype === 'Admin')
                    <li><a href="{{ url('/dashboard') }}" class="sidebar-link">Dashboard</a></li>
                    <li><a href="{{ route('inventory.index') }}" class="sidebar-link">Inventory</a></li>
                    <li><a href="{{ route('manage_users.index') }}" class="sidebar-link">Manage Users</a></li>
                    <li><a href="#" class="sidebar-link">Orders</a></li>
                    <li><a href="#" class="sidebar-link">Reports</a></li>
                @elseif($usertype === 'User')
                    <li><a href="#" class="sidebar-link">Browse Items</a></li>
                    <li><a href="#" class="sidebar-link">Help/Support</a></li>
                @endif
            </ul>
        </nav>
        <div class="logout" id="logout-section">
            <button onclick="alert('Logout not implemented');" id="logout-btn">Logout</button>
        </div>
    </div>

    <div style="margin-left: 270px;">
        @yield('content')
    </div>
</div>
</body>
</html>
