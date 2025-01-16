@extends('template.index')
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Acara</li>
        </ol>
    </nav>
    <title>Riwayat</title>

    <div class="container mt-4">
    <h1 class="mb-3">Riwayat</h1>

    <div class="d-flex justify-content-end align-items-center gap-3">
        <!-- Grup Filter (Pilih Daerah dan Tahun) -->
        <div class="d-flex align-items-center gap-2">
            <label for="region" class="mb-0">Pilih Daerah</label>
            <select id="region" class="form-select form-select-sm w-auto">
                <option value="sumatra">TVRI Sumatra</option>
                <option value="jawa">TVRI Jawa</option>
                <option value="kalimantan">TVRI Kalimantan</option>
                <option value="sulawesi">TVRI Sulawesi</option>
                <option value="papua">TVRI Papua</option>
                <option value="bali">TVRI Bali</option>
                <option value="ntb">TVRI NTB</option>
                <option value="ntt">TVRI NTT</option>
            </select>

            <label for="year" class="mb-0">Tahun</label>
            <select id="year" class="form-select form-select-sm w-auto">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
            </select>
        </div>

        <!-- Tombol Unduh -->
        <button class="btn btn-outline-success btn-sm d-flex align-items-center gap-1" style="background: transparent; border: 1px solid #198754;">
            <span>Unduh</span> <i class="bi bi-download"></i>
        </button>
    </div>
</div>
</div>
        <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- Tampil 10 Antrian (Sebelah Kiri) -->
    <div class="d-flex align-items-center gap-2">
        <span>Tampil</span>
        <select name="entries" class="form-select form-select-sm w-auto">
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
        <span>Antrian</span>
    </div>

    <!-- Icon Search (Sebelah Kanan) -->
    <form class="search-form d-flex align-items-center" method="POST" action="#">
    <button type="submit" class="btn btn-outline-secondary btn-sm" title="Search">
        <i class="bi bi-search"></i>
    </button>
    <input type="text" class="form-control form-control-sm" name="query" placeholder="Search" title="Enter search keyword">
    </form>

</div>

    </div>

        <div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Tiket Kerjasama</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Progam Acara</th>
                    <th>Stasiun TV</th>
                    <th>Kerjasama</th>
                    <th>Durasi</th>
                    <th>Dipesan</th>
                    <th>Berakhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbo<table class="table table-bordered table-striped">
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>TXR-20241212-001</td>
            <td>Budi Hadi</td>
            <td>Talkshow Sore Hari</td>
            <td>TVRI Nasional</td>
            <td>PSA</td>
            <td>Reguler 5 Detik</td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>Selesai</td>
        </tr>
        <tr>
            <td>2</td>
            <td>TXR-20241212-001</td>
            <td>Budi Hadi</td>
            <td>Talkshow Sore Hari</td>
            <td>TVRI Nasional</td>
            <td>PSA</td>
            <td>Reguler 5 Detik</td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>Selesai</td>
        </tr>
        <tr>
            <td>3</td>
            <td>TXR-20241212-001</td>
            <td>Budi Hadi</td>
            <td>Talkshow Sore Hari</td>
            <td>TVRI Nasional</td>
            <td>PSA</td>
            <td>Reguler 5 Detik</td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>Ditolak</td>
        </tr>
        <tr>
            <td>4</td>
            <td>TXR-20241212-001</td>
            <td>Budi Hadi</td>
            <td>Talkshow Sore Hari</td>
            <td>TVRI Nasional</td>
            <td>Iklan Komersial</td>
            <td>Reguler 5 Detik</td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>Dibatalkan</td>
        </tr>
        <tr>
            <td></td>
            <td>TXR-20241212-001</td>
            <td>Budi Hadi</td>
            <td>Talkshow Sore Hari</td>
            <td>TVRI Nasional</td>
            <td>Penyiaran Program</td>
            <td>60 Menit/Episode</td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <span style="display: block;">17.10.15</span>
                    <span style="display: block;">12 Des 2024</span>
                </div>
            </td>
            <td>Selesai</td>
        </tr>
    </tbody>
</table>



        
        <div class="pagination-container d-flex justify-content-between align-items-center mt-2">
    <div class="pagination-text">
        Halaman Data ke - 1 <br>
        Menampilkan 1 - 8 dari 8 hasil
    </div>
    <div class="pagination">
        <button class="btn btn-outline-primary btn-sm">&laquo;</button>
        <button>1</button>
        <button class="btn btn-outline-primary btn-sm">&raquo;</button>
    </div>
</div>

    </div>
@endsection