@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard 01</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2" data-bs-toggle="modal"
                data-bs-target="#tambahBukuModal">
                <span>
                    <i class="fa fa-plus"></i>
                </span> Tambah Buku
            </a>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Basic Datatable</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">No</th>
                                    <th class="wd-15p border-bottom-0">Judul</th>
                                    <th class="wd-20p border-bottom-0">Penerbit</th>
                                    <th class="wd-15p border-bottom-0">Tanggal Rilis</th>
                                    <th class="wd-10p border-bottom-0">Harga</th>
                                    <th class="wd-25p border-bottom-0">Stok</th>
                                    <th class="wd-25p border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book as $books)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $books->title }}</td>
                                        <td>{{ $books->publisher }}</td>
                                        <td>{{ $books->published_date }}</td>
                                        <td>{{ $books->price }}</td>
                                        <td>{{ $books->stock }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/operator/user/pangan/' . encrypt($books->id) . '/edit') }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/operator/user/pangan/' . encrypt($books->id)) }}"
                                                class="btn btn-primary">
                                                <i class="ti ti-eye"></i></a>
                                            <form id="deleteForm{{ $books->id }}"
                                                action="{{ url('/operator/user/pangan/' . $books->id) }}"
                                                style="display: inline;" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger deleteBtn"
                                                    data-id="{{ $books->id }}"><i class="ti ti-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahBukuModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tambahBukuForm">
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judulBuku" placeholder="Masukkan judul buku"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="pengarangBuku" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pengarangBuku"
                                placeholder="Masukkan nama pengarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahunTerbit" placeholder="Masukkan tahun terbit"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tahunTerbit" class="form-label">Gambar</label>
                            <input type="file" class="form-control" placeholder="Masukkan tahun terbit" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="tambahBukuForm" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
