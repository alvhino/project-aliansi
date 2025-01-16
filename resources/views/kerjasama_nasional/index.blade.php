@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kerjasama Nasional</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Kerjasama Nasional</h1>
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
                       placeholder="Cari..." 
                       value="{{ request('search') }}" 
                       class="form-control form-control-sm w-auto">
                <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0" id="kerjasamaNasionalTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kerjasama</th>
                        <th>Deskripsi</th>
                        <th>Ikon Kerjasama</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kerjasamaNasional as $index => $kerjasama)
                    <tr>
                        <td>{{ $loop->iteration + ($kerjasamaNasional->currentPage() - 1) * $kerjasamaNasional->perPage() }}</td>
                        <td>{{ $kerjasama->nama_kerjasama }}</td>
                        <td>{{ $kerjasama->deskripsi }}</td>
                        <td>
                            <span class="badge {{ $kerjasama->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $kerjasama->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($kerjasama->updated_at)->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $kerjasama->kerjasama_id }}"
                                    data-nama="{{ $kerjasama->nama_kerjasama }}"
                                    data-deskripsi="{{ $kerjasama->deskripsi }}"
                                    data-status="{{ $kerjasama->status }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <form action="{{ url('kerjasama-nasional/delete', $kerjasama->kerjasama_id) }}" method="POST" class="d-inline">
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
            <span>Menampilkan {{ $kerjasamaNasional->firstItem() }} - {{ $kerjasamaNasional->lastItem() }} dari {{ $kerjasamaNasional->total() }} hasil</span>
            {{ $kerjasamaNasional->appends(['entries' => request('entries')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Kerjasama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahForm" action="{{ url('kerjasama-nasional/add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namaKerjasama" class="form-label">Nama Kerjasama</label>
                        <input type="text" class="form-control" id="namaKerjasama" name="nama_kerjasama" placeholder="Masukkan nama kerjasama" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiKerjasama" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiKerjasama" name="deskripsi" rows="3" placeholder="Masukkan deskripsi kerjasama" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="statusKerjasama" class="form-label">Status</label>
                        <select class="form-select" id="statusKerjasama" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
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
                <h5 class="modal-title" id="editModalLabel">Edit Kerjasama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editKerjasamaId">
                    <div class="mb-3">
                        <label for="editNamaKerjasama" class="form-label">Nama Kerjasama</label>
                        <input type="text" class="form-control" id="editNamaKerjasama" name="nama_kerjasama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiKerjasama" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsiKerjasama" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editStatusKerjasama" class="form-label">Status</label>
                        <select class="form-select" id="editStatusKerjasama" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </form>
            </div>
@endsection    
    