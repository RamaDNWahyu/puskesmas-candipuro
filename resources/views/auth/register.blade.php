@extends('layouts.app')
@section('title', 'Daftar')

@section('content')
<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto" style="background: linear-gradient(147.04deg,#ca7b70 .74%,#5a2119 99.61%)">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-15 px-30">
            <!--begin::Aside header-->
            <a href="#" class="login-logo py-6">
                <img src="media/logos/logo-1.png" class="max-h-70px" alt="" />
            </a>
            <!--end::Aside header-->
        </div>
        <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">Puskesmas
            <br>Candipuro
            <br>Lamsel</h3>
        <!--end::Aside Top-->
        <!--begin::Aside Bottom-->
        <div class="aside-img-wizard d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center pt-2 pt-lg-5" style="background-position-y: calc(100% + 3rem); background-image: url(media/svg/illustrations/features.svg)"></div>
        <!--end::Aside Bottom-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="login-content flex-column-fluid d-flex flex-column p-10">
        <!--begin::Top-->
        <!--end::Top-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form login-form-signup">
                <!--begin::Form-->
                <form class="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <!--begin: Wizard Step 1-->
                    <div class="pb-5">
                        <!--begin::Title-->
                        <div class="pb-10 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark display5">Pendaftaran Akun</h3>
                            <div class="text-muted font-weight-bold font-size-h4">Sudah pernah daftar ?
                            <a href="{{ route('login')}}" class="text-primary font-weight-bolder">Masuk Sini</a></div>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form Group-->
                        <div class="form-group @error('name') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="name" placeholder="Nama Lengkap" value="" />
                            @error('name')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group @error('username') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                            <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="username" placeholder="Username" value="" />
                            @error('username')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group @error('ktp') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">KTP</label>
                            <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="ktp" placeholder="KTP Pasien" value="" />
                            @error('ktp')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <!--end::Form Group-->
                        <!--begin::Form Group-->
                        <div class="form-group @error('email') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input type="email" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="contoh mail@gmail.com"/>
                            @error('email')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <!--end::Form Group-->
                        <!--begin::Form Group-->
                        <div class="form-group @error('password') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                            <input type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" placeholder="Password" />
                            @error('password')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group @error('password_confirmation') has-danger @enderror">
                            <label class="font-size-h6 font-weight-bolder text-dark">Konfirmasi Password</label>
                            <input type="password" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password_confirmation" placeholder="Konfirmasi Password" />
                            @error('password_confirmation')
                            <div class="fv-plugins-message-container">
                                <div class="fv-help-block">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Daftar</button>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <!--end: Wizard Step 1-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
@endsection


@push('script')
@endpush
