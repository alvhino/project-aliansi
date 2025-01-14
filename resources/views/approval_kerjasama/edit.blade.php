@extends('template.index')

@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-4">
        <h2 class="me-auto">Edit Pengajuan Kerjasama</h2>
        <a href="{{ url('/approval-kerja-sama') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/approval-kerja-sama/update/' . $data->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="no_tiket" class="form-label">No Tiket Kerjasama</label>
                    <input type="text" class="form-control" id="no_tiket" name="no_tiket" value="{{ $data->no_tiket }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="{{ $data->nama_pemesan }}">
                </div>

                <div class="mb-3">
                    <label for="stasiun_tv" class="form-label">Stasiun TV</label>
                    <input type="text" class="form-control" id="stasiun_tv" name="stasiun_tv" value="{{ $data->stasiun_tv }}">
                </div>

                <div class="mb-3">
                    <label for="kerjasama" class="form-label">Jenis Kerjasama</label>
                    <input type="text" class="form-control" id="kerjasama" name="kerjasama" value="{{ $data->kerjasama }}">
                </div>

                <div class="mb-3">
                    <label for="durasi" class="form-label">Durasi</label>
                    <input type="text" class="form-control" id="durasi" name="durasi" value="{{ $data->durasi }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kerjasama</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $data->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tarif" class="form-label">Tarif (Rp)</label>
                            <input type="number" class="form-control" id="tarif" name="tarif" value="{{ $data->tarif }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="total_tayang" class="form-label">Total Tayang</label>
                            <input type="number" class="form-control" id="total_tayang" name="total_tayang" value="{{ $data->total_tayang }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="biaya_total" class="form-label">Biaya Total (Rp)</label>
                            <input type="number" class="form-control" id="biaya_total" name="biaya_total" value="{{ $data->biaya_total }}" readonly>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('tarif').addEventListener('input', calculateTotal);
    document.getElementById('total_tayang').addEventListener('input', calculateTotal);

    function calculateTotal() {
        const tarif = parseFloat(document.getElementById('tarif').value) || 0;
        const totalTayang = parseInt(document.getElementById('total_tayang').value) || 0;
        const total = tarif * totalTayang;
        document.getElementById('biaya_total').value = total;
    }
</script>
@endsection