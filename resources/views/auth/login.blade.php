{{-- Extends layout --}}
@extends('layouts.app')
@section('title', 'Masuk')

{{-- Content --}}
@section('content')

<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
            <!--begin::Aside header-->
            <a href="#" class="login-logo text-center pt-lg-25 pb-10">
                <img src="media/logos/logo-1.png" class="max-h-70px" alt="" />
            </a>
            <!--end::Aside header-->
            <!--begin::Aside Title-->
            <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">User Experience &amp; Interface Design
            <br />Strategy SaaS Solutions</h3>
            <!--end::Aside Title-->
        </div>
        <!--end::Aside Top-->
        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% + 5rem); background-image: url(media/svg/illustrations/login-visual-5.svg)"></div>
        <!--end::Aside Bottom-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="login-content flex-row-fluid d-flex flex-column p-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form">
                <!--begin::Form-->
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!--begin::Title-->
                    <div class="pb-5 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Masuk</h3>
                        <div class="text-muted font-weight-bold font-size-h4">Belum daftar?
                        <a href="{{ route('register') }}" class="text-primary font-weight-bolder">Buat akun sekarang</a></div>
                    </div>
                    <!--begin::Title-->
                    <!--begin::Form group-->
                    <div class="form-group @error('username') has-danger @enderror">
                        <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                        <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="text" name="username" value="{{ old('username') }}" placeholder="Silahkan gunakan No.RM/Username/Email Anda" />
                        @error('username')
                        <div class="fv-plugins-message-container">
                            <div class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Form group-->
                    <div class="form-group @error('password') has-danger @enderror">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                            <a href="custom/pages/login/login-3/forgot.html" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Lupa Password ?</a>
                        </div>
                        <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off" />
                        @error('password')
                        <div class="fv-plugins-message-container">
                            <div class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                    <!--end::Form group-->
                    <!--begin::Action-->
                    <div class="pb-lg-0 pb-5">
                        <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                    </div>
                    <!--end::Action-->
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

{{-- Scripts Section --}}
@section('scripts')

@endsection
