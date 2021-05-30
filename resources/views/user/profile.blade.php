{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
@if(!auth()->user()->updated)
<div class="alert alert-custom alert-warning" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">Silahkan lengkapi profile anda sebelum melakukan transaksi apapun!</div>
</div>
@endif
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
<form action="{{ url('profile') }}" method="post">
    @csrf
    @method('PUT')
<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
        <!--begin::Profile Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <div class="symbol-label" style="background-image:url('https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="{{ auth()->user()->name }}')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $data->name }}</a>
                        @if(auth()->user()->role == 'Pasien')
                        <div class="text-muted">{{ $data->kepesertaan }}</div>
                        @endif
                        <div class="text-muted">RM-{{ $data->no_rm }}</div>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Email:</span>
                        <a href="mailto:{{ $data->email }}" class="text-muted text-hover-primary">{{ $data->email }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">No HP:</span>
                        <span class="text-muted">{{ $data->no_hp }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="font-weight-bold mr-2">Username:</span>
                        <span class="text-muted">{{ $data->username }}</span>
                    </div>
                </div>
                <!--end::Contact-->
                <div class="separator separator-dashed my-2"></div>
                <!--begin::Nav-->
                <h5>Ganti Info Login</h5>
                @if(auth()->user()->role == 'Pasien')
                <div class="form-group">
                    <label for="example-username-input">Username</label>
                     <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $data->username) }}" type="text" name="username"/>
                     @error('username')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                     <div class="help-block">Jika tidak ingin merubah username, jangan di ubah!</div>
                </div>
                @endif
                <div class="form-group">
                    <label for="example-password-input">Password Baru</label>
                     <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"/>
                     @error('password')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                     <div class="help-block">Jika tidak ingin merubah passsword, biarkan kosong saja!</div>
                </div>
                <div class="form-group">
                    <label for="example-password-input">Konfirmasi Password</label>
                     <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation"/>
                     @error('password_confirmation')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Profile Card-->
    </div>
    <!--end::Aside-->
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
                <!--begin::Body-->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">KTP</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('ktp', $data->ktp) }}" class="form-control @error('ktp') is-invalid @enderror" type="text" name="ktp" placeholder="Contoh: 1871xxxx"/>
                            @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Nama Lengkap</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('name', $data->name) }}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama Lengkap" name="name"/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option @if(old('gender', $data->gender) == 'Laki-laki') selected @endif value="Laki-laki">Laki-laki</option>
                                <option @if(old('gender', $data->gender) == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" value="{{ old('tanggal_lahir', \Carbon\Carbon::now()->format('Y-m-d')) }}" name="tanggal_lahir"/>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Nama KK</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('nama_kk', $data->nama_kk) }}" class="form-control @error('nama_kk') is-invalid @enderror" type="text" placeholder="Nama KK" name="nama_kk"/>
                            @error('nama_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Nomor Handphone</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('no_hp', $data->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" type="tel" name="no_hp"/>
                            @error('no_hp')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                            <span class="form-text text-muted">Isi nomor handphone menggunakan kode +62, contoh : +6281414xxxxx</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>
                        <div class="col-lg-9 col-xl-6">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if(auth()->user()->role == 'Pasien')
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Kepesertaan</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control @error('kepesertaan') is-invalid @enderror" name="kepesertaan">
                                <option @if(old('kepesertaan', $data->kepesertaan) == 'PBI') selected @endif value="PBI">PBI</option>
                                <option @if(old('kepesertaan', $data->kepesertaan) == 'NON PBI') selected @endif value="NON PBI">NON PBI</option>
                                <option @if(old('kepesertaan', $data->kepesertaan) == 'UMUM') selected @endif value="UMUM">UMUM</option>
                            </select>
                            @error('kepesertaan')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Pekerjaan</label>
                        <div class="col-lg-9 col-xl-6">
                            <input value="{{ old('pekerjaan', $data->pekerjaan) }}" class="form-control @error('pekerjaan') is-invalid @enderror" type="text" placeholder="Contoh: Sistem Analis" name="pekerjaan"/>
                            @error('pekerjaan')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
</div>
</form>

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
