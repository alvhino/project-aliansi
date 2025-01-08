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
                <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="form-control form-control-sm">
                <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengirim</th>
                        <th>Judul Respon</th>
                        <th>Respon Mitra</th>
                        <th>Respon Anda</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Respon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedback as $index => $item)
                    <tr>
                        <td>{{ $loop->iteration + ($feedback->currentPage() - 1) * $feedback->perPage() }}</td>
                        <td>{{ $item->nama_pengirim }}</td>
                        <td>{{ $item->judul_respon }}</td>
                        <td>
                            <span class="badge {{ $item->status == 'Selesai' ? 'bg-success' : ($item->status == 'Ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ url('feedback/edit/' . $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ url('feedback/delete/' . $item->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <span>Menampilkan {{ $feedback->firstItem() }} - {{ $feedback->lastItem() }} dari {{ $feedback->total() }} hasil</span>
            {{ $feedback->appends(request()->all())->links('pagination::bootstrap-4') }}
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
                        <label for="namaPengirim" class="form-label">Nama Pengirim</label>
                        <input type="text" class="form-control" id="namaPengirim" name="nama_pengirim" placeholder="Masukkan nama pengirim" required>
                    </div>
                    <div class="mb-3">
                        <label for="judulRespon" class="form-label">Judul Respon</label>
                        <input type="text" class="form-control" id="judulRespon" name="judul_respon" placeholder="Masukkan judul respon" required>
                    </div>
                    <div class="mb-3">
                        <label for="statusFeedback" class="form-label">Status</label>
                        <select class="form-select" id="statusFeedback" name="status">
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Dibatalkan">Dibatalkan</option>
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
@endsection
