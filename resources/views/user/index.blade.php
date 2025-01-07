@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pengguna</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Hak Akses</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telp ?? '-' }}</td>
                    <td>{{ $user->role->name ?? '-' }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
