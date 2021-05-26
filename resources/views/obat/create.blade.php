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
      Tambah Obat
     </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="{{ url('obat') }}">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Silahkan isi informasi obat dengan benar dan lengkap, sesuai dengan <code>informasi</code> obat yang asli.
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">Kode Obat</label>
       <div class="col-10">
        <input value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" type="text" name="kode" placeholder="Contoh: KDXXXX"/>
        @error('kode')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label  class="col-2 col-form-label">Nama Obat</label>
       <div class="col-10">
        <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Nama Obat" name="name"/>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
      <div class="form-group row">
       <label class="col-2 col-form-label">Jenis Obat</label>
       <div class="col-10">
        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
            <option @if(old('jenis') == 'Anak - Anak') selected @endif value="Anak - Anak">Anak - Anak</option>
            <option @if(old('jenis') == 'Dewasa') selected @endif value="Dewasa">Dewasa</option>
        </select>
        @error('jenis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>

      <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Ketentuan</label>
        <div class="col-10">
         <textarea class="form-control @error('ketentuan') is-invalid @enderror" name="alamat">{{ old('ketentuan') }}</textarea>
         @error('ketentuan')
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
