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
                    <i class="fe fe-plus"></i>
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
                                    <th class="wd-15p border-bottom-0">First name</th>
                                    <th class="wd-15p border-bottom-0">Last name</th>
                                    <th class="wd-20p border-bottom-0">Position</th>
                                    <th class="wd-15p border-bottom-0">Start date</th>
                                    <th class="wd-10p border-bottom-0">Salary</th>
                                    <th class="wd-25p border-bottom-0">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bella</td>
                                    <td>Chloe</td>
                                    <td>System Developer</td>
                                    <td>2018/03/12</td>
                                    <td>$654,765</td>
                                    <td>b.Chloe@datatables.net</td>
                                </tr>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="tambahBukuForm" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
