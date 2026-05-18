<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anggota['nama'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/anggota">Daftar Anggota</a></li>
                <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
            </ol>
        </nav>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Anggota</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="200">Kode Anggota</th>
                                <td>: {{ $anggota['kode'] }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $anggota['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $anggota['email'] }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $anggota['telepon'] }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $anggota['alamat'] }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>: 
                                    @if ($anggota['status'] == 'Aktif')
                                        <span class="badge bg-success">{{ $anggota['status'] }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $anggota['status'] }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="/anggota" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Anggota
            </a>
        </div>
    </div>
</body>
</html>