@extends('template.index')
@section('content')
<div class="bg-gray-900 text-white min-h-screen p-5">
    <div class="container mx-auto">
        <h1 class="text-xl font-bold mb-5">Kategori Acara</h1>

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <div>
                    <span>Tampil</span>
                    <select class="bg-gray-700 text-white rounded px-2 py-1 focus:outline-none">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    <span>entri</span>
                </div>
                <div>
                    <input 
                        type="text" 
                        placeholder="Cari" 
                        class="bg-gray-700 text-white rounded px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
            </div>

            <table class="table-auto w-full text-left text-sm">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Kategori</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Diperbarui</th>
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
                    <tr class="border-t border-gray-700">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $kategori['nama_kategori'] }}</td>
                        <td class="px-4 py-2">{{ $kategori['status'] }}</td>
                        <td class="px-4 py-2">{{ $kategori['updated_at']->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4 border-t border-gray-700 flex justify-between items-center">
                <div>
                    <span>Menampilkan 1 - 4 dari 4 hasil</span>
                </div>
                <div>
                    <!-- Pagination placeholder -->
                    <nav class="inline-flex">
                        <button class="bg-gray-700 text-white px-3 py-1 rounded-l">&laquo;</button>
                        <button class="bg-gray-700 text-white px-3 py-1">1</button>
                        <button class="bg-gray-700 text-white px-3 py-1">2</button>
                        <button class="bg-gray-700 text-white px-3 py-1">3</button>
                        <button class="bg-gray-700 text-white px-3 py-1 rounded-r">&raquo;</button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
