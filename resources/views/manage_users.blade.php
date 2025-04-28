@extends('layouts.app') {{-- Assuming you have a sidebar layout called layouts.app --}}

@section('content')
<div id="manage-users" style="margin-left: 50px;">
    <h1>Manage Users</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Add User Form -->
    <div class="manage-users-card">
        <h3>Add New User</h3>
        <form method="POST" action="{{ route('manage_users.store') }}">
            @csrf
            <div class="manage-users-input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="manage-users-input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="manage-users-input-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div class="manage-users-input-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <div class="manage-users-input-group">
                <label for="usertype">User Type</label>
                <select id="usertype" name="usertype" required>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>

            <button type="submit" name="add_user">Add User</button>
        </form>
    </div>

    <!-- Users Table -->
    <div class="manage-users-card">
        <h3>Existing Users</h3>
        <table class="manage-users-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->userID }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                            <form method="POST" action="{{ route('manage_users.destroy', $user->userID) }}">
                                @csrf
                                <button type="submit" class="manage-users-delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
