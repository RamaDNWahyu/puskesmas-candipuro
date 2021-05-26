{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <div class="symbol-label" style="background-image:url('https://ui-avatars.com/api/?name={{ $data->pasien->name }}" alt="{{ $data->pasien->name }}')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ $data->pasien->name }}</a>
                        <div class="text-muted">RM-{{ $data->pasien->no_rm }}</div>
                        <div class="text-muted">{{ $data->pasien->kepesertaan }}</div>
                        <div class="text-muted">{{ $data->pasien->ktp }}</div>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="pt-8 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Nama KK:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ $data->pasien->nama_kk }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Phone:</span>
                        <span class="text-muted">{{ $data->pasien->no_hp }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Umur:</span>
                        <span class="text-muted">{{ \Carbon\Carbon::parse($data->pasien->tanggal_lahir)->age }} Tahun</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Jenis Kelamin:</span>
                        <span class="text-muted">{{ $data->pasien->gender }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Pekerjaan:</span>
                        <span class="text-muted">{{ $data->pasien->pekerjaan }}</span>
                    </div>
                </div>
                <!--end::Contact-->
                <!--begin::Contact-->
                <span class="text-muted">Alamat</span>
                <div class="pb-6">{{ $data->pasien->alamat }}</div>
                <!--end::Contact-->
                <a href="@if(auth()->user()->role == 'Pasien') {{ url('profile') }} @else # @endif" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Profile Overview</a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
        <!--begin::Mixed Widget 14-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title font-weight-bolder">Informasi saat Berobat</h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex flex-column">
                <span class="text-muted">No. Urut</span>
                <p class="text-center font-weight-bold" style="font-size: 5.6rem">{{ $data->berobat->no_urut }}</p>
                <div class="pt-8 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Tanggal Berobat:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ \Carbon\Carbon::parse($data->berobat->tanggal)->format('d F Y') }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Rujukan:</span>
                        <span class="text-muted">{{ $data->berobat->rujukan ? 'Iya' : 'Tidak' }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="font-weight-bold mr-2">Status:</span>
                        <span class="text-muted">{{ $data->berobat->status }}</span>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 14-->
    </div>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">Hasil Rekam Medis</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="col-2 col-form-label text-right">Amnesa</label>
                    <div class="col-10">
                        <textarea readonly name="keluhan" class="form-control @error('keluhan') is-invalid @endif" rows="3">{{ old('keluhan', $data->keluhan) }}</textarea>
                        @error('keluhan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-2 col-form-label text-right">Diagnosa</label>
                    <div class="col-10">
                        <textarea readonly name="diagnosa" class="form-control @error('diagnosa') is-invalid @endif" rows="3">{{ old('diagnosa', $data->diagnosa) }}</textarea>
                        @error('diagnosa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-2 col-form-label text-right">Terapi</label>
                    <div class="col-10">
                        <textarea readonly name="terapi" class="form-control @error('terapi') is-invalid @endif" rows="3">{{ old('terapi', $data->terapi) }}</textarea>
                        @error('terapi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-2 col-form-label text-right">Keterangan</label>
                    <div class="col-10">
                        <textarea readonly name="keterangan" class="form-control @error('keterangan') is-invalid @endif" rows="3">{{ old('keterangan', $data->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ url('rekam-medis') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <!--end::Aside-->
</div>

@endsection

{{-- Styles Section --}}
@section('styles')
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script>
    </script>
@endsection
