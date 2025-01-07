@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Acara</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Kategori Acara</h1>
        <!-- Tombol Tambah -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus"></i> Tambah
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span>Tampil</span>
                <select class="form-select form-select-sm w-auto">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span>entri</span>
            </div>
            <div>
                <input 
                    type="text" 
                    placeholder="Cari..." 
                    class="form-control form-control-sm w-auto"
                    aria-label="Search"
                />
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyData = [
                            ['nama_kategori' => 'Hiburan', 'status' => 'Aktif', 'updated_at' => now()],
                            ['nama_kategori' => 'Berita dan Informasi', 'status' => 'Aktif', 'updated_at' => now()],
                            ['nama_kategori' => 'Edukasi', 'status' => 'Nonaktif', 'updated_at' => now()],
                            ['nama_kategori' => 'Olahraga', 'status' => 'Aktif', 'updated_at' => now()],
                        ];
                    @endphp

                    @foreach ($dummyData as $index => $kategori)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kategori['nama_kategori'] }}</td>
                        <td>
                            <span 
                                class="badge 
                                {{ $kategori['status'] === 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                {{ $kategori['status'] }}
                            </span>
                        </td>
                        <td>{{ $kategori['updated_at']->format('d M Y') }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" onclick="confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <span>Menampilkan 1 - 4 dari 4 hasil</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Form Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" placeholder="Masukkan nama kategori">
                    </div>
                    <div class="mb-3">
                        <label for="statusKategori" class="form-label">Status</label>
                        <select class="form-select" id="statusKategori">
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
@endsection
