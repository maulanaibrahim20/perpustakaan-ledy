@extends('index')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2" data-bs-toggle="modal"
                data-bs-target="#tambahBukuModal">
                <span>
                    <i class="fa fa-plus"></i>
                </span> Tambah Category
            </a>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">No</th>
                                    <th class="wd-15p border-bottom-0">Nama Category</th>
                                    <th class="wd-25p border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $categorys)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categorys->name }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#example-edit{{ $categorys->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form id="deleteForm{{ $categorys->id }}"
                                                action="{{ url('/admin/master/category/' . $categorys->id) }}"
                                                style="display: inline;" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger deleteBtn"
                                                    data-id="{{ $categorys->id }}"><i class="ti ti-trash"></i></button>
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
                    <form id="tambahBukuForm" action="{{ url('/admin/master/category') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Nama Kategori Buku</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan Category Buku"
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

    @foreach ($category as $edit)
        <div class="modal fade" id="example-edit{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin/master/category/' . $edit->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $edit->name }}"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.deleteBtn').on('click', function() {
                const categoryId = $(this).data('id');
                const form = $(`#deleteForm${categoryId}`);

                // SweetAlert2 konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data kategori ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form jika user mengonfirmasi
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
