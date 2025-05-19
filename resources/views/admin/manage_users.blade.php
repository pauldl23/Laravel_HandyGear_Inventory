@extends('layouts.sidebar')



@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div id="manage-users" style="margin-left: 10px;">
    <h1>Manage Users</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

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
                    <!-- Display Row -->
                    <tr>
                        <td>{{ $user->userID }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                            <button onclick="toggleEditForm({{ $user->userID }})">Edit</button>
                            <form method="POST" action="{{ route('manage_users.destroy', $user->userID) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="manage-users-delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    <!-- Edit Row -->
                    <tr id="edit-form-{{ $user->userID }}" class="edit-form-row" style="display: none;">
                        <form method="POST" action="{{ route('manage_users.edit', $user->userID) }}">
                            @csrf
                            
                                    <!-- Empty cell for left margin -->
                              <td></td>
                            <td><input type="text" name="username" value="{{ $user->username }}" required></td>
                            <td><input type="text" name="firstname" value="{{ $user->firstname }}" required></td>
                            <td><input type="text" name="lastname" value="{{ $user->lastname }}" required></td>
                            <td>
                                <select name="usertype" required>
                                    <option value="Admin" {{ $user->usertype == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ $user->usertype == 'User' ? 'selected' : '' }}>User</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit">Save</button>
                                <button type="button" onclick="toggleEditForm({{ $user->userID }})">Cancel</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</div>

<script>
    function toggleEditForm(userId) {
        const formRow = document.getElementById(`edit-form-${userId}`);
        formRow.style.display = (formRow.style.display === "none" || formRow.style.display === "") ? "table-row" : "none";
    }
</script>
@endsection