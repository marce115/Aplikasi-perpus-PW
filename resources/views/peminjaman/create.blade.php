<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="fw-bold text-primary mb-4"><i class="fas fa-plus-circle me-2"></i>Tambah Peminjaman Buku</h3>

                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="anggota_id" class="form-label fw-semibold">Pilih Anggota</label>
                                <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Anggota --</option>
                                    @foreach($anggota as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_anggota }} - {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('anggota_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="buku_id" class="form-label fw-semibold">Pilih Buku</label>
                                <select name="buku_id" id="buku_id" class="form-select @error('buku_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Buku --</option>
                                    @foreach($buku as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_buku }} - {{ $item->judul }} (Stok: {{ $item->stok }})</option>
                                    @endforeach
                                </select>
                                @error('buku_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ date('Y-m-d') }}" required>
                                @error('tanggal_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan Peminjaman
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