<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold text-primary"><i class="fas fa-book me-2"></i>Daftar Buku Perpustakaan</h2>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('buku.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Buku Baru
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
                                <th class="py-3" style="width: 15%;">Kode Buku</th>
                                <th class="py-3" style="width: 25%;">Judul</th>
                                <th class="py-3" style="width: 15%;">Pengarang</th>
                                <th class="py-3" style="width: 15%;">Penerbit</th>
                                <th class="py-3 text-center" style="width: 10%;">Tahun</th>
                                <th class="py-3 text-center" style="width: 10%;">Stok</th>
                                <th class="py-3 text-center" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $index => $item)
                                <tr>
                                    <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                                    <td><span class="badge bg-secondary">{{ $item->kode_buku }}</span></td>
                                    <td class="fw-bold text-dark">{{ $item->judul }}</td>
                                    <td>{{ $item->pengarang }}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td class="text-center">{{ $item->tahun_terbit }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-success px-3 py-2">{{ $item->stok }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning fw-semibold">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-semibold">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                        Belum ada data buku yang tersedia.
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