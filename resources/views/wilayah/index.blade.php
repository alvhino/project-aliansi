@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wilayah</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Wilayah</h1>
        <!-- Tombol Tambah -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus"></i> Tambah Wilayah
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Wilayah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wilayahs as $wilayah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wilayah->nama_wilayah }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $wilayah->id }}"
                                    data-nama="{{ $wilayah->nama_wilayah }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <!-- Tombol Hapus -->
                            <form action="{{ url('wilayah/delete', $wilayah->wilayah_id ) }}" method="get" class="d-inline">
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
                        <td colspan="3" class="text-center">Data wilayah tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Wilayah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tambahForm" action="{{ url('wilayah/add') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namaWilayah" class="form-label">Nama Wilayah</label>
                        <input type="text" class="form-control" id="namaWilayah" name="nama_wilayah" placeholder="Masukkan nama wilayah" required>
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
                <h5 class="modal-title" id="editModalLabel">Edit Wilayah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ url('wilayah/update', $wilayah->wilayah_id ) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editWilayahId">
                    <div class="mb-3">
                        <label for="editNamaWilayah" class="form-label">Nama Wilayah</label>
                        <input type="text" class="form-control" id="editNamaWilayah" name="nama_wilayah" required>
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

        const editForm = document.getElementById('editForm');
        editForm.action = `/wilayah/update/${wilayah_id}`;

        document.getElementById('editWilayahId').value = id;
        document.getElementById('editNamaWilayah').value = nama;
    });
</script>
@endsection
