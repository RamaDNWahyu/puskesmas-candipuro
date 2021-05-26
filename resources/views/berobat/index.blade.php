{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
@if($message = session('message'))
<div class="alert alert-custom alert-notice alert-light-{{ $message['color'] }} fade show shadow-sm" role="alert">
    <div class="alert-icon"><i class="flaticon2-{{ $message['success'] ? 'checkmark' : 'warning' }} "></i></div>
    <div class="alert-text">{{ $message['message'] }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body d-flex p-0">
                <div class="flex-grow-1 bg-danger p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(/media/svg/humans/custom-3.svg)">
                    <h4 class="text-inverse-danger mt-2 font-weight-bolder">Nomor Antrian Anda</h4>
                    <p class="text-inverse-danger my-6">Silahkan refresh widget antrian <br> untuk mendapatkan list yang terupdate.</p>
                    <p class="text-inverse-danger" style="font-size: 1.6rem">No. </p>
                    <span style="font-size: 6.5rem" class="text-inverse-danger mx-5">{{ $pendaftaran_anda->no_urut ?? '∞'}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card card-custom bg-light gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bold text-dark">Daftar Berobat</h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <!--begin::Form-->
                <form class="form" action="{{ url('berobat') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="col-form-label">No RM</label>
                        <input readonly value="{{ $data->no_rm }}" type="text" class="form-control border-0" name="no_rm" placeholder="Name">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="col-form-label">Nama Pasien</label>
                                <input readonly type="text" class="form-control border-0" name="text" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="col-form-label">Nama KK</label>
                                <input readonly type="text" class="form-control border-0" name="text" value="{{ $data->nama_kk }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="col-form-label">Kunjungan</label>
                        <select name="tipe_kunjungan" class="form-control">
                            <option value="KIA">KIA</option>
                            <option value="Poli Gigi">Poli Gigi</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="col-form-label">Rujukan</label>
                        <div class="radio-inline">
                            <label class="radio radio-danger radio-lg">
                            <input type="radio" @if(old('rujukan') == '0') checked="checked" @endif name="rujukan" value="0">
                            <span></span>Tidak</label>

                            <label class="radio radio-lg">
                            <input @if(old('rujukan') == '1') checked="checked" @endif type="radio" name="rujukan" value="1">
                            <span></span>Iya</label>
                        </div>

                    </div>
                    <p>Umur <strong>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}</strong> Tahun</p>
                    <div class="mt-10">
                        <button class="btn btn-primary font-weight-bold" type="submit">Daftar Sekarang</button>
                        @if($pendaftaran_anda != null)
                        <button class="btn btn-danger font-weight-bold" type="button" id="batalkan-daftar">Batalkan Pendaftaran</button>
                        @endif
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-sm-12 col-md-4" id="card-pendaftar">
        <div class="card card-custom bg-light-success card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-success">Antrian</h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button"  class="btn btn-clean btn-hover-success btn-sm btn-icon" id="btn-refresh-pendaftar">
                            <i class="ki ki-refresh text-success"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <div id="row-pendaftaran" class="overlay-wrapper">
                    @include('berobat._row_pendaftar', ['yang_berobat' => $yang_berobat])
                </div>
                <div class="overlay-layer bg-dark-o-10 d-none" id="loading-pendaftar">
                    <div class="spinner spinner-primary"></div>
                </div>
                <hr>
                <!--end::Item-->
                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-white mr-5">
                        <div class="symbol-label">
                            <img src="@if($data->gender == 'Lelaki') /media/svg/avatars/008-boy-3.svg @else /media/svg/avatars/002-girl.svg @endif" class="h-75 align-self-end" alt="">
                        </div>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $data->name }}</a>
                        <span class="text-muted">No Urut > {{ $pendaftaran_anda->no_urut ?? '∞' }}</span>
                    </div>
                    <!--end::Text-->
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Riwayat Pendaftaran</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Informasi riwayat pendaftaran anda di puskesmas</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2 pb-0 mt-n3">
                <div class="table-responsive">
                    <table class="table table-borderless table-vertical-center">
                        <!--begin::Thead-->
                        <thead>
                            <tr>
                                <th class="p-0 w-50px"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                                <th class="p-0"></th>
                            </tr>
                        </thead>
                        <!--end::Thead-->
                        <!--begin::Tbody-->
                        <tbody>
                            @forelse ($data->berobat as $d)
                            <tr>
                                <td class="pl-0 py-5">
                                    <div class="symbol symbol-45 symbol-light mr-2">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                               <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Diagnostics.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2"/>
                                                    <path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                </td>
                                <td class="pl-0">
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">RM-{{$data->no_rm}}</a>
                                    <span class="text-muted font-weight-bold d-block">{{ $data->name }}</span>
                                </td>
                                <td class="text-left">
                                    <span class="text-muted font-weight-bold d-block font-size-sm">Tanggal</span>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ \Carbon\Carbon::parse($d->tanggal)->format('d F Y') }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">No Urut</span>
                                    <span class="text-muted font-weight-bold d-block font-size-sm">{{ $d->no_urut }}</span>
                                    <span class="text-muted font-weight-bold d-block font-size-sm"> Kunjungan KIA </span>
                                </td>
                                <td class="text-right pr-0">
                                     <span class="label label-info label-inline mr-2">{{ ucwords($d->status) }}</span>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5" class="text-center">Tidak ada riwayat pengobatan</td>
                            @endforelse
                        </tbody>
                        <!--end::Tbody-->
                    </table>
                </div>
            </div>
            <!--end::Body-->
        </div>
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
        $('#batalkan-daftar').on('click', function () {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Pendaftaran yang dibatalkan tidak dapat dikembalikan!",
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
                                url: '/berobat/batalkan',
                                type: "delete",
                            }).done(function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: data.message,
                                icon: "success"
                            })
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
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
        })
        $('#btn-refresh-pendaftar').on('click', function () {
            $('#card-pendaftar').addClass('overlay overlay-block');
            $('#loading-pendaftar').removeClass('d-none');

            $.ajax({
                type: 'GET',
                url: '{{ url()->current() }}',
                success(res) {
                    $('#row-pendaftaran').html(res);
                    $('#card-pendaftar').removeClass('overlay overlay-block');
                    $('#loading-pendaftar').addClass('d-none');
                }
            })
        })

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
                'url': '{{ url("/obat/data-table") }}',
                'type': 'GET',
            },
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                },
                {
                    data: 'kode', name: 'kode', orderable: true, searchable: true
                },
                {
                    data: 'name', name: 'name', orderable: true, searchable: true
                },
                {
                    data: 'jenis', name: 'jenis', orderable: true, searchable: true
                },
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                },
            ],
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 4]
                },
                {
                    className: 'text-wrap',
                    targets: []
                }
            ],
        });
    })
    </script>
@endsection
