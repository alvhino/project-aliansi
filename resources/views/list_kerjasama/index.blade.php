@extends('template.index')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent px-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Kerjasama</li>
        </ol>
    </nav>

    <!-- Title -->
    <h1 class="mb-4 fw-bold">List Kerjasama</h1>

    <!-- Dropdown -->
    <div class="d-flex justify-content-end mb-3">
        <select class="form-select w-auto" style="min-width: 150px;">
            <option>Pilih Daerah</option>
        </select>
    </div>

    <!-- List Items -->
    <div class="list-group">
        @foreach ($kerjasama as $item)
        <div class="list-group-item d-flex justify-content-between align-items-center px-4 py-3" 
             style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 8px; margin-bottom: 10px;">
            <div>
                <h5 class="mb-1 fw-bold" style="font-size: 18px;"> <a href="" style="color: black;"> {{ $item['name'] }} </a></h5>
                <p>{{ $item['detail'] }}</p>
            </div>
            <a href="#" class="text-decoration-none text-dark" style="font-size: 20px; transform: rotate(-45deg);">&#8594;</a>
        </div>
        @endforeach
    </div>
@endsection