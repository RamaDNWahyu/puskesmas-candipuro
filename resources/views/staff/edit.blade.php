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
      Edit Staff : {{ $data->name }}
     </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="{{ url('staff/' . $data->id) }}">
        @csrf
        @method('PUT')
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Silahkan isi informasi staff dengan benar dan lengkap, sesuai dengan <code>informasi</code> yang diberikan oleh staff.
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">KTP</label>
       <div class="col-10">
        <input value="{{ old('ktp', $data->ktp) }}" class="form-control @error('ktp') is-invalid @enderror" type="text" name="ktp" placeholder="Contoh: 1871xxxx"/>
        @error('ktp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label  class="col-2 col-form-label">Nama Lengkap</label>
       <div class="col-10">
        <input value="{{ old('name', $data->name) }}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama Lengkap" name="name"/>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label class="col-2 col-form-label">Jenis Kelamin</label>
       <div class="col-10">
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
        <label class="col-2 col-form-label">Tanggal Lahir</label>
        <div class="col-10">
         <input value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" value="{{ old('tanggal_lahir', \Carbon\Carbon::now()->format('Y-m-d')) }}" name="tanggal_lahir"/>
         @error('tanggal_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

      <div class="form-group row">
        <label  class="col-2 col-form-label">Nama KK</label>
        <div class="col-10">
         <input value="{{ old('nama_kk', $data->nama_kk) }}" class="form-control @error('nama_kk') is-invalid @enderror" type="text" placeholder="Nama KK" name="nama_kk"/>
         @error('nama_kk')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>


      <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Nomor Handphone</label>
        <div class="col-10">
         <input value="{{ old('no_hp', $data->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" type="tel" name="no_hp"/>
         @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
         <span class="form-text text-muted">Isi nomor handphone menggunakan kode +62, contoh : +6281414xxxxx</span>
        </div>
       </div>

       <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Alamat</label>
        <div class="col-10">
         <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
         @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>


       <div class="form-group row">
        <label  class="col-2 col-form-label">Pekerjaan</label>
        <div class="col-10">
         <input value="{{ old('pekerjaan', $data->pekerjaan) }}" class="form-control @error('pekerjaan') is-invalid @enderror" type="text" placeholder="Contoh: Sistem Analis" name="pekerjaan"/>
         @error('pekerjaan')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

       <div class="form-group row">
        <label class="col-2 col-form-label">Role</label>
        <div class="col-10">
         <select class="form-control @error('role') is-invalid @enderror" name="role">
             <option @if(old('role', $data->role) == 'Petugas Medis') selected @endif value="Petugas Medis">Petugas Medis</option>
             <option @if(old('role', $data->role) == 'Petugas Pelayanan') selected @endif value="Petugas Pelayanan">Petugas Pelayanan</option>
             <option @if(old('role', $data->role) == 'Petugas KIA') selected @endif value="Petugas KIA">Petugas KIA</option>
             <option @if(old('role', $data->role) == 'Kepala Puskes') selected @endif value="Kepala Puskes">Kepala Puskes</option>
         </select>
         @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
       </div>

       <div class="separator separator-dashed mt-8 mb-5"></div>

      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Username</label>
       <div class="col-10">
        <input value="{{ old('username', $data->username) }}" class="form-control @error('username') is-invalid @enderror" name="username" type="text"/>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Email</label>
       <div class="col-10">
        <input value="{{ old('email', $data->email) }}" disabled class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Contoh: puskes@mail.com"/>
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
