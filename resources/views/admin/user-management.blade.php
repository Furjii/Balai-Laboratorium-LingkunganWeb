@extends('layouts.admin-sidebar')

@section('content')
    <div class="container">
        <h1>Manajemen User</h1>
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('admin.addUserForm') }}" class="btn btn-primary">Tambah User</a>
        </div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role == 'admin' ? 'Admin' : 'User' }}</td>
                        <td>
                            <!-- Add action buttons here, e.g., Edit and Delete -->
                            {{-- <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-warning">Edit</a> --}}
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
