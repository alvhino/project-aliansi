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
            <div>
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
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0" id="feedbackTable">
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
                    @forelse ($categories as $index => $feedback)
                    <tr>
                        <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                        <td>{{ $feedback->nama_feedback}}</td>
                        <td>
                            <span class="badge {{ $feedback->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $feedback->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($feedback->updated_at)->format('d M Y') }}</td>
                        <td>
    <a href="/feedback-acara/edit/{{ $feedback->feedback }}" class="btn btn-sm btn-warning">
        <i class="fa fa-edit"></i> Edit
    </a>
    <a href="/feedback-acara/delete/{{ $feedback->feedback_id }}" 
       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
       class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i> Hapus
    </a>
</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <span>Menampilkan {{ $categories->firstItem() }} - {{ $categories->lastItem() }} dari {{ $categories->total() }} hasil</span>
            {{ $categories->appends(['entries' => request('entries')])->links('pagination::bootstrap-4') }}
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
                <!-- Form untuk tambah feedback -->
                <form id="tambahForm" action="{{ url('feedback-acara/add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namaFeedback" class="form-label">Umpan Balik</label>
                        <input type="text" class="form-control" id="namaFeedback" name="nama_feedback" placeholder="Masukkan nama feedback" required>
                    </div>
                    <div class="mb-3">
                        <label for="statusFeedback" class="form-label">Status</label>
                        <select class="form-select" id="statusFeedback" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary" form="tambahForm">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Pencarian feedback
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#feedbackTable tbody tr');

        rows.forEach(row => {
            const namaFeedback = row.children[1].textContent.toLowerCase();
            if (namaFeedback.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
