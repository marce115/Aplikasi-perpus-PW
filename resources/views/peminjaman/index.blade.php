<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman - Perpustakaan</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold text-primary"><i class="fas fa-handshake me-2"></i>Daftar Peminjaman Buku</h2>
            </div>
            <div class="col-md-6 text-md-end">
               <a href="{{ route('peminjaman.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Peminjaman Baru
                </a>
            </div>
        </div>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="py-3 text-center" style="width: 5%;">No</th>
                                <th class="py-3" style="width: 25%;">Nama Anggota</th>
                                <th class="py-3" style="width: 35%;">Judul Buku</th>
                                <th class="py-3 text-center" style="width: 20%;">Tanggal Pinjam</th>
                                <th class="py-3 text-center" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($peminjaman as $index => $item)
                                <tr>
                                    <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                                    <!-- Mengambil nama dari relasi Anggota -->
                                    <td class="fw-bold text-dark">
                                        <i class="fas fa-user text-secondary me-1"></i> {{ $item->anggota->nama ?? 'Data Anggota Tidak Ditemukan' }}
                                    </td>
                                    <!-- Mengambil judul dari relasi Buku -->
                                    <td>
                                        <i class="fas fa-book text-secondary me-1"></i> {{ $item->buku->judul ?? 'Data Buku Tidak Ditemukan' }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-dark px-3 py-2">{{ $item->tanggal_pinjam }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="#" class="btn btn-sm btn-warning fw-semibold" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="#" method="POST" onsubmit="return confirm('Yakin hapus data peminjaman ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-semibold" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                        Belum ada data peminjaman buku yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>