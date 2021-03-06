{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Laporan Pelayanan
                <div class="text-muted pt-2 font-size-sm">Silahkan gunakan filter melakukan rekapitulasi laporan</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Export
                </button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                        <li class="navi-item">
                            <a target="_blank" href="{{ url('laporan/pelayanan-print?tanggal_awal=' . request()->get('tanggal_awal') . '&tanggal_akhir=' . request()->get('tanggal_akhir')) }}" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-print"></i>
                                </span>
                                <span class="navi-text">Print</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
        </div>
    </div>

    <div class="card-body">

        <!--begin::Search Form-->
        <form action="{{ url()->current() }}" method="GET">
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">

                        <div class="col-md-6 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Dari Tanggal:</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ request()->get('tanggal_awal', today()->format('Y-m-d')) }}">
                            </div>
                        </div>

                        <div class="col-md-6 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Ke Tanggal:</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ request()->get('tanggal_akhir', today()->format('Y-m-d')) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                        Check
                    </button>
                </div>
            </div>
        </div>
        </form>
        <!--end::Search Form-->

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>PBI</th>
                <th>Non PBI</th>
                <th>UMUM</th>
                <th>Rujukan PBI</th>
                <th>Rujukan Non PBI</th>
            </tr>
            </thead>
            <tbody>
                @php
                $pbi = 0;
                $non_pbi = 0;
                $umum = 0;
                $rujukan = 0;
                $non_rujukan = 0;
                @endphp
                @forelse ($table as $t)
                    <tr>
                        <td width="2%">{{ $loop->index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_berobat)->format('d F Y') }}</td>
                        <td>{{ $t->pbi_count }}</td>
                        <td>{{ $t->non_pbi_count }}</td>
                        <td>{{ $t->umum_count }}</td>
                        <td>{{ $t->rujukan_count }}</td>
                        <td>{{ $t->non_rujukan_count }}</td>
                    </tr>
                @php
                $pbi += $t->pbi_count;
                $non_pbi = $t->non_pbi_count;
                $umum = $t->umum_count;
                $rujukan = $t->rujukan_count;
                $non_rujukan = $t->non_rujukan_count;
                @endphp
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-center font-weight-bold"><h4>TOTAL</h4></td>
                    <td>{{ $pbi }}</td>
                    <td>{{ $non_pbi }}</td>
                    <td>{{ $umum }}</td>
                    <td>{{ $rujukan }}</td>
                    <td>{{ $non_rujukan }}</td>
                </tr>
            </tfoot>
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
@endsection
