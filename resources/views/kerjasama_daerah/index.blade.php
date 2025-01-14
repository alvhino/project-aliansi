@extends('template.index')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent px-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kerjasama Daerah</li>
        </ol>
    </nav>

    <!-- Title -->
    <h1 class="mb-4 fw-bold">Kerjasama Daerah</h1>

    <!-- Dropdown -->
    <div class="d-flex justify-content-end position-relative">
    <div class="dropdown">
        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih Daerah
            <span class="dropdown-arrow"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-end shadow-lg p-3" aria-labelledby="dropdownMenuButton">
            <div class="row g-3">
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI SUMATRA</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI JAWA</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI KALIMANTAN</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI SULAWESI</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI PAPUA</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI MALUKU</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI BALI</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI NTB</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown-item-custom">
                        <span class="region-label">TVRI NTT</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- List Items -->
    <div class="list-group">
        @foreach ($data as $item)
        <div class="list-group-item d-flex justify-content-between align-items-center px-4 py-3" 
             style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 8px; margin-bottom: 10px;">
            <div>
                <h5 class="mb-1 fw-bold" style="font-size: 18px;"> <a href="#" style="color: black;"> {{ $item['name'] }} </a></h5>
                <p class="mb-0 text-muted" style="font-size: 14px;">{{ $item['kerjasama'] }} Kerjasama | {{ $item['program'] }} Program Acara</p>
            </div>
            <a href="#" class="text-decoration-none text-dark" style="font-size: 20px; transform: rotate(-45deg);">&#8594;</a>
        </div>
        @endforeach
    </div>
@endsection
