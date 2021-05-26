{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">List Berobat Pasien
                <div class="text-muted pt-2 font-size-sm">Silahkan gunakan fitur pencarian untuk mencari obat dengan cepat</div>
            </h3>
        </div>
        @if(auth()->user()->role == 'Pelayanan')
        <div class="card-toolbar">
            <a href="{{ url('berobat/create') }}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <circle fill="#000000" cx="9" cy="15" r="6"/>
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>Daftarkan Pasien Berobat</a>
            <!--end::Button-->
        </div>
        @endif
    </div>

    <div class="card-body">

        <!--begin::Search Form-->
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-9">
                    <div class="row align-items-center">
                        <div class="col-md-3 my-2 my-md-0">
                            <input class="form-control" id="tanggal-input" type="date" value="{{ today()->format('Y-m-d') }}">
                        </div>

                        <div class="col-md-3 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                <select class="form-control" id="select-status">
                                    <option value="">Semua Status</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Rujukan:</label>
                                <select class="form-control" id="select-rujukan">
                                    <option value="">Semua Rujukan</option>
                                    <option value="1">Iya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Kepesertaan:</label>
                                <select class="form-control" id="select-kepesertaan">
                                    <option value="">Semua Kepesertaan</option>
                                    <option value="PBI">PBI</option>
                                    <option value="NON PBI">NON PBI</option>
                                    <option value="UMUM">UMUM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 mt-5 mt-lg-0">
                    <button type="button" id="btn-search" class="btn btn-light-primary px-6 font-weight-bold">
                        Search
                    </button>
                </div>
            </div>
        </div>
        <!--end::Search Form-->

        <table class="table table-bordered table-hover" id="datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>No RM</th>
                <th>No Urut</th>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Umur</th>
                <th>Nama KK</th>
                <th>Rujukan</th>
                <th>Kunjungan</th>
                <th width="20%">Action</th>
            </tr>
            </thead>
        </table>

    </div>

</div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
    var table;
    $(document).ready(function () {
        $('#btn-search').on('click', function () {
            table.ajax.reload(null, true);
        })
        table = $('#datatable').DataTable({
            order: [[ 2, "asc" ]],
            responsive: true,
            language: {
                searchPlaceholder: 'Cari...',
                sSearch: '',
                lengthMenu: '_MENU_ post/halaman',
            },
            processing: true,
            serverSide: true,
            ajax: {
                'url': '{{ url("/berobat/data-table") }}',
                'type': 'GET',
                'data': function (d) {
                    d.status =  $('#select-status').val(),
                    d.rujukan =  $('#select-rujukan').val(),
                    d.kepesertaan =  $('#select-kepesertaan').val(),
                    d.tanggal =  $('#tanggal-input').val()
                }
            },
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                },
                {
                    data: 'no_rm', name: 'no_rm', orderable: true, searchable: true
                },
                {
                    data: 'no_urut', name: 'no_urut', orderable: true, searchable: true
                },
                {
                    data: 'pasien.name', name: 'pasien.name', orderable: true, searchable: true
                },
                {
                    data: 'tanggal', name: 'tanggal', orderable: false, searchable: false
                },
                {
                    data: 'pasien.tanggal_lahir', name: 'pasien.tanggal_lahir', orderable: false, searchable: false
                },
                {
                    data: 'pasien.nama_kk', name: 'pasien.nama_kk', orderable: true, searchable: true
                },
                {
                    data: 'rujukan', name: 'rujukan', orderable: false, searchable: false
                },
                {
                    data: 'jenis_kunjungan', name: 'jenis_kunjungan', orderable: true, searchable: true
                },
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                },
            ],
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 9]
                },
                {
                    className: 'text-wrap',
                    targets: []
                }
            ],
        });
    })

    function remove(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Dokumen yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Iya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            confirmButtonClass: "btn btn-danger mt-2",
            cancelButtonClass: "btn btn-primary ml-2 mt-2",
            buttonsStyling: !1,
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function (resolve) {
                    $.ajax(
                        {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/berobat/' + id,
                            type: "delete",
                        }).done(function (data) {
                        table.ajax.reload();
                        Swal.fire({
                            title: "Berhasil!",
                            text: data.message,
                            icon: "success"
                        })
                    }).fail(function (jqXHR, ajaxOptions, thrownError) {
                        Swal.fire({
                            title: "Gagal",
                            text: "Proses hapus gagal!",
                            icon: "error"
                        })
                    });
                })
            }
        }).then(function (t) {
            if (!t.value) {
                t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Dibatalkan",
                    text: "Hapus dibatalkan!",
                    icon: "error"
                })
            }
        })
    }
    function selesai(id) {
        Swal.fire({
            title: "Apakah pasien telah selesai diperiksa?",
            text: "Pasien yang telah diperiksa akan berganti status nya menjadi selesai!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Iya, Selesai!",
            cancelButtonText: "Tidak, Batalkan!",
            confirmButtonClass: "btn btn-primary mt-2",
            cancelButtonClass: "btn btn-danger ml-2 mt-2",
            buttonsStyling: !1,
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: () => {
                return new Promise(function (resolve) {
                    $.ajax(
                        {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/berobat/selesai/' + id,
                            type: "post",
                        }).done(function (data) {
                        table.ajax.reload();
                        Swal.fire({
                            title: "Berhasil!",
                            text: data.message,
                            icon: "success"
                        })
                    }).fail(function (jqXHR, ajaxOptions, thrownError) {
                        Swal.fire({
                            title: "Gagal",
                            text: "Proses penyelsaian gagal!",
                            icon: "error"
                        })
                    });
                })
            }
        }).then(function (t) {
            if (!t.value) {
                t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Dibatalkan",
                    text: "Penyelsaian dibatalkan!",
                    icon: "error"
                })
            }
        })
    }
    </script>
@endsection
