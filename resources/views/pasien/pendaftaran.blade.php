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
<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Pendaftaran Pasien Baru
     </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="{{ url('pasien') }}">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Silahkan isi informasi pasien dengan benar dan lengkap, sesuai dengan <code>informasi</code> yang diberikan oleh pasien.
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">KTP</label>
       <div class="col-10">
        <input value="{{ old('ktp') }}" class="form-control @error('ktp') is-invalid @enderror" type="text" name="ktp" placeholder="Contoh: 1871xxxx"/>
        @error('ktp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label  class="col-2 col-form-label">Nama Lengkap</label>
       <div class="col-10">
        <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama Lengkap" name="name"/>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label class="col-2 col-form-label">Jenis Kelamin</label>
       <div class="col-10">
        <select class="form-control @error('gender') is-invalid @enderror" name="gender">
            <option @if(old('gender') == 'Laki-laki') selected @endif value="Laki-laki">Laki-laki</option>
            <option @if(old('gender') == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
        </select>
        @error('gender')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Tanggal Lahir</label>
        <div class="col-10">
         <input value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" value="{{ old('tanggal_lahir', \Carbon\Carbon::now()->format('Y-m-d')) }}" name="tanggal_lahir"/>
         @error('tanggal_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

      <div class="form-group row">
        <label  class="col-2 col-form-label">Nama KK</label>
        <div class="col-10">
         <input value="{{ old('nama_kk') }}" class="form-control @error('nama_kk') is-invalid @enderror" type="text" placeholder="Nama KK" name="nama_kk"/>
         @error('nama_kk')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>


      <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Nomor Handphone</label>
        <div class="col-10">
         <input value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" type="tel" name="no_hp"/>
         @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
         <span class="form-text text-muted">Isi nomor handphone menggunakan kode +62, contoh : +6281414xxxxx</span>
        </div>
       </div>

       <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Alamat</label>
        <div class="col-10">
         <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat') }}</textarea>
         @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

       <div class="form-group row">
        <label class="col-2 col-form-label">Kepesertaan</label>
        <div class="col-10">
         <select class="form-control @error('kepesertaan') is-invalid @enderror" name="kepesertaan">
             <option @if(old('kepesertaan') == 'PBI') selected @endif value="PBI">PBI</option>
             <option @if(old('kepesertaan') == 'NON PBI') selected @endif value="NON PBI">NON PBI</option>
             <option @if(old('kepesertaan') == 'UMUM') selected @endif value="UMUM">UMUM</option>
         </select>
         @error('kepesertaan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

       <div class="form-group row">
        <label  class="col-2 col-form-label">Pekerjaan</label>
        <div class="col-10">
         <input value="{{ old('pekerjaan') }}" class="form-control @error('pekerjaan') is-invalid @enderror" type="text" placeholder="Contoh: Sistem Analis" name="pekerjaan"/>
         @error('pekerjaan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

       <div class="separator separator-dashed mt-8 mb-5"></div>

      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Username</label>
       <div class="col-10">
        <input value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username" type="text"/>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Email</label>
       <div class="col-10">
        <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Contoh: puskes@mail.com"/>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-password-input" class="col-2 col-form-label">Password</label>
       <div class="col-10">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"/>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-password-input" class="col-2 col-form-label">Konfirmasi Password</label>
       <div class="col-10">
        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation"/>
        @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
     </div>
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10 text-right">
        <button type="submit" class="btn btn-success mr-2">Simpan</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
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
