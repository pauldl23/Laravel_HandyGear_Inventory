<div class="wrapper">
    <div class="sidebar" id="sidebar-admin-user">
        <div class="logo" id="logo">
            HandyGear System
        </div>
        <nav id="sidebar-nav">
            <ul id="sidebar-menu">
                @if (Auth::user()->usertype == 'Admin')
                    <li><a href="{{ route('dashboard') }}" class="sidebar-link">Dashboard</a></li>
                    <li><a href="{{ route('inventory') }}" class="sidebar-link">Inventory</a></li>
                    <li><a href="{{ route('manage.users') }}" class="sidebar-link">Manage Users</a></li>
                    <li><a href="{{ route('orders') }}" class="sidebar-link">Orders</a></li>
                    <li><a href="{{ route('reports') }}" class="sidebar-link">Reports</a></li>
                @else
                    <li><a href="{{ route('browse.items') }}" class="sidebar-link">Browse Items</a></li>
                    <li><a href="{{ route('help.support') }}" class="sidebar-link">Help/Support</a></li>
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
</div>
