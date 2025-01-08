@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manajemen Pengguna</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Manajemen Pengguna</h1>
        <!-- Tombol Tambah -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus"></i> Tambah Pengguna
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center gap-2">
                <span>Tampil</span>
                <select name="entries" onchange="this.form.submit()" class="form-select form-select-sm w-auto">
                    <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                </select>
                <span>entri</span>
            </form>
            <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center gap-2">
                <input type="text" 
                       name="search" 
                       placeholder="Cari..." 
                       value="{{ request('search') }}" 
                       class="form-control form-control-sm w-auto">
                <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0" id="userTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Foto Profile</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telepon ?? '-' }}</td>
                        <td>
                        @if($user->foto_profile)
    <img src="{{ asset('' . $user->foto_profile) }}" alt="Profile" class="img-thumbnail" width="50">
@else
    <img src="{{ asset('foto_profile/default.jpg') }}" alt="Default Profile" class="img-thumbnail" width="50">
@endif
                        </td>
                        <td>{{ $user->role->nama_role ?? '-' }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                        <td>
                        <button class="btn btn-sm btn-warning" 
        data-bs-toggle="modal" 
        data-bs-target="#editModal"
        data-id="{{ $user->user_id }}"
        data-nama="{{ $user->nama }}"
        data-username="{{ $user->username }}"
        data-email="{{ $user->email }}"
        data-telepon="{{ $user->telepon }}"
        data-role_id="{{ $user->role_id }}"
        data-status="{{ $user->status }}">
    <i class="fa fa-edit"></i> Edit
</button>

                            <form action="{{ url('user/delete', $user->user_id) }}" method="get" class="d-inline">
                                @csrf
                                <button type="submit" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" 
                                        class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <span>Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }} hasil</span>
            {{ $users->appends(['entries' => request('entries')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahForm" action="{{ url('user/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_profile" class="form-label">Foto Profile</label>
                        <input type="file" class="form-control" id="foto_profile" name="foto_profile">
                        <small class="text-muted">Format: jpeg, png, jpg, gif (max 2MB)</small>
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" id="role_id" name="role_id" required>
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="tambahForm">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="editUserId">
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTelepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="editTelepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFotoProfile" class="form-label">Foto Profile</label>
                        <input type="file" class="form-control" id="editFotoProfile" name="foto_profile">
                        <small class="text-muted">Format: jpeg, png, jpg, gif (max 2MB)</small>
                    </div>
                    <div class="mb-3">
                        <label for="editRoleId" class="form-label">Role</label>
                        <select class="form-select" id="editRoleId" name="role_id" required>
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="editForm">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
 document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editModal');
    var editForm = document.getElementById('editForm');

    // Pastikan editModal ada sebelum menambahkan event listener
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            // Tombol yang memicu modal
            var button = event.relatedTarget;

            // Ambil data dari atribut tombol (pastikan tombol punya atribut terkait)
            var userId = button.getAttribute('data-id') || '';
            var nama = button.getAttribute('data-nama') || '';
            var username = button.getAttribute('data-username') || '';
            var email = button.getAttribute('data-email') || '';
            var telepon = button.getAttribute('data-telepon') || '';
            var roleId = button.getAttribute('data-role_id') || '';
            var status = button.getAttribute('data-status') || '';

            // Isi data ke dalam form modal
            document.getElementById('editUserId').value = userId;
            document.getElementById('editNama').value = nama;
            document.getElementById('editUsername').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editTelepon').value = telepon;
            document.getElementById('editRoleId').value = roleId;
            document.getElementById('editStatus').value = status;

            // Update form action dengan ID pengguna
            if (editForm) {
                editForm.action = `/user/update/${userId}`;
            }
        });

        editModal.addEventListener('hidden.bs.modal', function () {
            // Bersihkan form saat modal ditutup
            document.getElementById('editUserId').value = '';
            document.getElementById('editNama').value = '';
            document.getElementById('editUsername').value = '';
            document.getElementById('editEmail').value = '';
            document.getElementById('editTelepon').value = '';
            document.getElementById('editRoleId').value = '';
            document.getElementById('editStatus').value = '';

            // Reset action form
            if (editForm) {
                editForm.action = '';
            }
        });
    }
});

</script>

@endpush