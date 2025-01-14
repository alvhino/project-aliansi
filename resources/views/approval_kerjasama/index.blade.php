@extends('template.index')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Acara</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Kategori Acara</h1>
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
    
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Stasiun TV</th>
                        <th>Kerjasama</th>
                        <th>Durasi</th>
                        <th>Dipesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_pemesan }}</td>
                        <td>{{ $item->stasiun_tv }}</td>
                        <td>{{ $item->kerjasama }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->created_at->format('H:i:s d M Y') }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="lihatDetail({{ $item->id }})">Lihat Detail</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                    <tr>
                        <td colspan="10" class="text-center">tidak ada data</td>
                    </tr>
            </table>
        </div>
    </div>
</div>





<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Pengajuan Kerjasama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <p><strong>No Tiket Kerjasama:</strong> <span id="detailNoTiket"></span></p>
                        <p><strong>Nama Pemesan:</strong> <span id="detailNamaPemesan"></span></p>
                        <p><strong>Stasiun TV:</strong> <span id="detailStasiun"></span></p>
                        <p><strong>Kerjasama:</strong> <span id="detailKerjasama"></span></p>
                        <p><strong>Durasi:</strong> <span id="detailDurasi"></span></p>
                        <p><strong>Dipesan:</strong> <span id="detailDipesan"></span></p>
                        <p><strong>Deskripsi Kerjasama:</strong></p>
                        <p id="detailDeskripsi"></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Tarif yang Dikenakan:</strong></p>
                        <p>Rp <span id="detailTarif"></span></p>
                        <p><strong>Total Tayang:</strong> <span id="detailTotalTayang"></span></p>
                        <p><strong>Biaya Total:</strong> Rp <span id="detailBiayaTotal"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Tolak Pengajuan</button>
                <button class="btn btn-success">Setujui Pengajuan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function lihatDetail(id) {
        fetch(`/approval-kerja-sama/detail/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('detailNoTiket').textContent = data.no_tiket;
                document.getElementById('detailNamaPemesan').textContent = data.nama_pemesan;
                document.getElementById('detailStasiun').textContent = data.stasiun_tv;
                document.getElementById('detailKerjasama').textContent = data.kerjasama;
                document.getElementById('detailDurasi').textContent = data.durasi;
                document.getElementById('detailDipesan').textContent = data.dipesan;
                document.getElementById('detailDeskripsi').textContent = data.deskripsi;
                document.getElementById('detailTarif').textContent = data.tarif;
                document.getElementById('detailTotalTayang').textContent = data.total_tayang;
                document.getElementById('detailBiayaTotal').textContent = data.biaya_total;
                new bootstrap.Modal(document.getElementById('detailModal')).show();
            });
    }
</script>
@endsection
