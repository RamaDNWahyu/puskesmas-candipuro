{{-- Extends layout --}}
@extends('layout.default')


@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ $pasien_count }} Pasien</a>
                        <div class="text-dark-75">Jumlah Pasien yang telah terdaftar di dalam sistem kami.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-danger svg-icon-4x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Dial-numbers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2"/>
                                <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ $obat_count }} Obat</a>
                        <div class="text-dark-75">Kami memiliki {{ $obat_count }} obat dari berbagai kategori fungsi obat-obatan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-success svg-icon-4x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">{{ $pengobatan_count }} Pengobatan</a>
                        <div class="text-dark-75">Kami telah melakukan {{ $pengobatan_count }} kali riwayat pengobatan kepada seluruh pasien.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mt-5">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">Informasi Berobat Hari ini</h3>
            </div>
            <div class="card-body">

                <small>Tanggal {{ now()->format('d F Y') }}</small>
                <div class="d-flex align-items-center flex-wrap">
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon2-hourglass-1 icon-2x text-primary font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Pasien Menunggu</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold">{{ $pasien_menunggu_hari_ini }} </span>Pasien </span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon2-check-mark icon-2x text-success font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Pasien Selesai</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold">{{ $pasien_selesai_hari_ini }}</span> Pasien</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-users icon-2x text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Total Pasien yang Berobat</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold">{{$pasien_total_hari_ini}}</span> Pasien</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon2-fast-next icon-2x text-primary font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Nomor Antrian Selanjutnya</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold">Nomor Urut: </span>{{ $pasien_selanjutnya_hari_ini->no_urut ?? '-'}}</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-refresh icon-2x text-success font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Nomor Antrian Sekarang</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold">Nomor Urut: </span> {{ $pasien_sekarang_hari_ini->no_urut ?? '-' }}</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->

                    <!--end: Item-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
