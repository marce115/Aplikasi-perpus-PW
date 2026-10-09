<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-warning text-dark py-3 rounded-top-4">
                        <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit Data Buku</h4>
                    </div>
                    <div class="card-body p-4">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kode Buku</label>
                                <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku', $buku->kode_buku) }}" readonly>
                                <div class="form-text">Kode buku tidak dapat diubah.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang', $buku->pengarang) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Stok</label>
                                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $buku->stok) }}" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary px-4">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-warning px-4 shadow-sm text-dark fw-semibold">
                                    <i class="fas fa-save me-1"></i> Perbarui Data
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>