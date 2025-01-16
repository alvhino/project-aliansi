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
@endsection