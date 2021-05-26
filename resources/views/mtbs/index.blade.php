{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Data MTBS Pasien
                <div class="text-muted pt-2 font-size-sm">Silahkan gunakan fitur pencarian untuk mencari obat dengan cepat</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ url('mtbs/create') }}" class="btn btn-primary font-weight-bolder">
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
            </span>Tambah MTBS</a>
            <!--end::Button-->
        </div>
    </div>

    <div class="card-body">

        <!--begin::Search Form-->
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-4 col-xl-4">
                    <div class="row align-items-center">
                        <div class="col-md-12 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8 mt-5 mt-lg-0">
                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                        Search
                    </a>
                </div>
            </div>
        </div>
        <!--end::Search Form-->

        <table class="table table-bordered table-hover" id="datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>No RM</th>
                <th>Tanggal</th>
                <th>Nama Anak</th>
                <th>Gender</th>
                <th>Action</th>
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
        table = $('#datatable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Cari...',
                sSearch: '',
                lengthMenu: '_MENU_ post/halaman',
            },
            processing: true,
            serverSide: true,
            ajax: {
                'url': '{{ url("/mtbs/data-table") }}',
                'type': 'GET',
            },
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                },
                {
                    data: 'no_rm', name: 'no_rm', orderable: true, searchable: true
                },
                {
                    data: 'tanggal', name: 'tanggal', orderable: false, searchable: false
                },
                {
                    data: 'nama_anak', name: 'nama_anak', orderable: true, searchable: true
                },
                {
                    data: 'gender', name: 'gender', orderable: true, searchable: true
                },
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                },
            ],
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 5]
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
                            url: '/mtbs/' + id,
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
    </script>
@endsection
