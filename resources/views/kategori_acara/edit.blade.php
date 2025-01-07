@extends('template.index')
@section('content')
<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/kategori-acara">Kategori Acara</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="h5">Edit Kategori</h1>
        </div>
        <div class="card-body">
            <form action="/kategori-acara/update/{{ $kategori->kategori_id }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                    <input type="text" 
                           class="form-control" 
                           id="namaKategori" 
                           name="nama_kategori" 
                           value="{{ $kategori->nama_kategori }}" 
                           required>
                </div>
                <div class="mb-3">
                    <label for="statusKategori" class="form-label">Status</label>
                    <select class="form-select" id="statusKategori" name="status">
                        <option value="1" {{ $kategori->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $kategori->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="/kategori-acara" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
