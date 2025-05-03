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
                @elseif($usertype === 'User')
                <li><a href="{{ route('browse.items') }}" class="sidebar-link">Browse Items</a></li>
                    <li><a href="#" class="sidebar-link">Help/Support</a></li>
                @endif
            </ul>
        </nav>
        <div class="logout" id="logout-section">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" id="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div style="margin-left: 270px;">
        @yield('content')
    </div>
</div>
</body>
</html>
