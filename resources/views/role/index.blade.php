@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manajemen Role</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Manajemen Role</h1>
        <!-- Tombol Tambah -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus"></i> Tambah Role
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
            <table class="table table-bordered table-striped mb-0" id="roleTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Role</th>
                        <th>Level</th>
                        <th>Deskripsi</th>
                        <th>Diperbarui</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $index => $role)
                    <tr>
                        <td>{{ $loop->iteration + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                        <td>{{ $role->nama_role }}</td>
                        <td>{{ $role->level }}</td>
                        <td>{{ $role->deskripsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $role->role_id }}"
                                    data-nama="{{ $role->nama_role }}"
                                    data-level="{{ $role->level }}"
                                    data-deskripsi="{{ $role->deskripsi }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <form action="{{ url('role/delete', $role->role_id) }}" method="get" class="d-inline">
                                @csrf
                                <button type="submit" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus role ini?')" 
                                        class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <span>Menampilkan {{ $roles->firstItem() }} - {{ $roles->lastItem() }} dari {{ $roles->total() }} hasil</span>
            {{ $roles->appends(['entries' => request('entries')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahForm" action="{{ url('role/add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namaRole" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="namaRole" name="nama_role" placeholder="Masukkan nama role" required>
                    </div>
                    <div class="mb-3">
                        <label for="levelRole" class="form-label">Level</label>
                        <input type="number" class="form-control" id="levelRole" name="level" placeholder="Masukkan level role" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiRole" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiRole" name="deskripsi" rows="3" placeholder="Deskripsi role"></textarea>
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
                <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editRoleId">
                    <div class="mb-3">
                        <label for="editNamaRole" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="editNamaRole" name="nama_role" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLevelRole" class="form-label">Level</label>
                        <input type="number" class="form-control" id="editLevelRole" name="level" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiRole" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsiRole" name="deskripsi" rows="3"></textarea>
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

<script>
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const nama = button.getAttribute('data-nama');
        const level = button.getAttribute('data-level');
        const deskripsi = button.getAttribute('data-deskripsi');

        document.getElementById('editForm').action = /role/update/${id};
        document.getElementById('editRoleId').value = id;
        document.getElementById('editNamaRole').value = nama;
        document.getElementById('editLevelRole').value = level;
        document.getElementById('editDeskripsiRole').value = deskripsi;
    });
</script>
@endsection