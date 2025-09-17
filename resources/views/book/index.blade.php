<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <form method="GET" class="row mb-4">
        <div class="col-md-4">
            <select name="penulis" class="form-select" onchange="this.form.submit()">
                <option value="all" {{ ($penulis == 'all') ? 'selected' : '' }}>Semua Penulis</option>
                @foreach($list_penulis as $p)
                    <option value="{{ $p->penulis }}" {{ ($penulis == $p->penulis) ? 'selected' : '' }}>
                        {{ $p->penulis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <input type="text" name="keyword" class="form-control"
                   value="{{ $keyword }}" placeholder="Cari judul buku...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <h1 class="mb-4 text-center">Data Buku</h1>

    <table class="table table-bordered table-striped table-hover shadow-sm">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td class="text-center">{{ $book->id }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>Rp. {{ number_format($book->harga, 2, ',', '.') }}</td>
                    <td>{{ $book->tgl_terbit->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger">
                        Tidak ada judul buku yang ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

     <div class="card mt-4">
        <div class="card-body">
            <h5>Statistik Buku</h5>
            <p>Total Buku: {{ $statistik['total_buku'] }}</p>
            <p>Total Harga: Rp {{ number_format($statistik['total_harga'], 0, ',', '.') }}</p>
            <p>Harga Tertinggi: Rp {{ number_format($statistik['harga_tertinggi'], 0, ',', '.') }}</p>
            <p>Harga Terendah: Rp {{ number_format($statistik['harga_terendah'], 0, ',', '.') }}</p>
        </div>
    </div>

</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
