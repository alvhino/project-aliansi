@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Umpan Balik</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Umpan Balik</h1>
        <!-- Tombol Tambah -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus"></i> Tambah
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
                       placeholder="Cari judul..." 
                       value="{{ request('search') }}" 
                       class="form-control form-control-sm w-auto">
                <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Respon Mitra</th>
                        <th>Respon Admin</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umpanBalik as $index => $feedback)
                    <tr>
                        <td>{{ $loop->iteration + ($umpanBalik->currentPage() - 1) * $umpanBalik->perPage() }}</td>
                        <td>{{ $feedback->judul }}</td>
                        <td>{{ $feedback->respon_mitra }}</td>
                        <td>{{ $feedback->respon_admin }}</td>
                        <td>
                            <span class="badge {{ $feedback->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $feedback->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $feedback->feedback_id }}"
                                    data-judul="{{ $feedback->judul }}"
                                    data-respon_mitra="{{ $feedback->respon_mitra }}"
                                    data-respon_admin="{{ $feedback->respon_admin }}"
                                    data-status="{{ $feedback->status }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <form action="{{ url('feedback/delete', $feedback->feedback_id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
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
            <span>Menampilkan {{ $umpanBalik->firstItem() }} - {{ $umpanBalik->lastItem() }} dari {{ $umpanBalik->total() }} hasil</span>
            {{ $umpanBalik->appends(['entries' => request('entries')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Umpan Balik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahForm" action="{{ url('feedback/add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="responMitra" class="form-label">Respon Mitra</label>
                        <textarea class="form-control" id="responMitra" name="respon_mitra" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="responAdmin" class="form-label">Respon Admin</label>
                        <textarea class="form-control" id="responAdmin" name="respon_admin" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="tambahForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Umpan Balik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ url('feedback/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" id="editId" name="feedback_id">
                    <div class="mb-3">
                        <label for="editJudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="editJudul" name="judul" placeholder="Masukkan judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="editResponMitra" class="form-label">Respon Mitra</label>
                        <textarea class="form-control" id="editResponMitra" name="respon_mitra" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editResponAdmin" class="form-label">Respon Admin</label>
                        <textarea class="form-control" id="editResponAdmin" name="respon_admin" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="editForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
