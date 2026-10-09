<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Perpustakaan') }}
            </h2>
            <a href="{{ route('peminjaman.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow">
                + Peminjaman Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Info Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Card Buku -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Judul Buku</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBuku ?? 0 }}</h3>
                    <a href="{{ route('buku.index') }}" class="text-xs text-indigo-600 hover:underline mt-4 inline-block">Lihat semua buku &rarr;</a>
                </div>

                <!-- Card Stok Buku -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Total Stok Buku</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalStok ?? 0 }}</h3>
                    <p class="text-xs text-gray-400 mt-4">Eksemplar fisik tersedia</p>
                </div>

                <!-- Card Anggota -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Total Anggota</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalAnggota ?? 0 }}</h3>
                    <p class="text-xs text-indigo-600 mt-4">Kelola anggota</p>
                </div>

                <!-- Card Peminjaman Aktif -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 font-medium">Peminjaman Aktif</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $peminjamanAktif ?? 0 }}</h3>
                    <a href="{{ route('peminjaman.index') }}" class="text-xs text-indigo-600 hover:underline mt-4 inline-block">Lihat sirkulasi &rarr;</a>
                </div>
            </div>

            <!-- Tabel Aktivitas Terbaru -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Peminjaman Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b text-gray-400 text-sm">
                                <th class="pb-3 font-medium">Peminjam</th>
                                <th class="pb-3 font-medium">Buku</th>
                                <th class="pb-3 font-medium">Tanggal</th>
                                <th class="pb-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-50">
                            @forelse($peminjamanTerbaru ?? [] as $peminjaman)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 text-gray-700">{{ $peminjaman->anggota->nama ?? 'Nama Anggota' }}</td>
                                    <td class="py-3 text-gray-700">{{ $peminjaman->buku->judul ?? 'Judul Buku' }}</td>
                                    <td class="py-3 text-gray-500">{{ $peminjaman->created_at->format('d M Y') }}</td>
                                    <td class="py-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $peminjaman->status == 'Dipinjam' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">
                                            {{ $peminjaman->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-4 text-center text-gray-400">Belum ada data peminjaman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>