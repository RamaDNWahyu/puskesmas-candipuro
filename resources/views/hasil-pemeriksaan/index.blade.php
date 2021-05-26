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
      Form Pemeriksaan
     </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="{{ url('hasil-pemeriksaan') }}">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Silahkan isi informasi hasil pemeriksaan pasien dengan benar dan lengkap, sesuai dengan <code>hasil</code> pemeriksaan dokter.
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label text-right">Pasien</label>
       <div class="col-10">
        <select class="form-control" name="no_rm" id="no_rm">
            <option></option>
            @foreach ($data as $s)
                <option data-gender={{ $s->gender }} data-berobat="{{$s->id_berobat}}" data-kk="{{ $s->nama_kk }}" data-umur="{{ \Carbon\Carbon::parse($s->tanggal_lahir)->age }}" value="{{ $s->no_rm }}">{{ $s->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      <input type="hidden" id="id-berobat" name="id_berobat">
      <div id="row-hidden" class="d-none">
        <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label text-right">No RM</label>
            <div class="col-10">
                <input type="text" readonly id="no_rm_temp" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label text-right">Nama KK</label>
            <div class="col-10">
                <input type="text" readonly id="nama_kk_temp" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label text-right">Umur</label>
            <div class="col-10">
                <input type="number" readonly id="umur_temp" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label text-right">Jenis Kelamin</label>
            <div class="col-10">
                <input type="text" readonly id="gender_temp" class="form-control">
            </div>
        </div>
      </div>
      <div class="form-group row">
          <label for="" class="col-2 col-form-label text-right">Keluhan Pasien</label>
          <div class="col-10">
              <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @endif" rows="3">{{ old('keluhan') }}</textarea>
              @error('keluhan')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="" class="col-2 col-form-label text-right">Diagnosa</label>
          <div class="col-10">
              <textarea name="diagnosa" class="form-control @error('diagnosa') is-invalid @endif" rows="3">{{ old('diagnosa') }}</textarea>
              @error('diagnosa')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="" class="col-2 col-form-label text-right">Terapi</label>
          <div class="col-10">
              <textarea name="terapi" class="form-control @error('terapi') is-invalid @endif" rows="3">{{ old('terapi') }}</textarea>
              @error('terapi')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="" class="col-2 col-form-label text-right">Keterangan</label>
          <div class="col-10">
              <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @endif" rows="3">{{ old('keterangan') }}</textarea>
              @error('keterangan')
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
        $(document).ready(function () {
            $('#no_rm').select2({
                placeholder: 'Pilih Pasien'
            })

            $('#no_rm').on('change', function () {
                $('#row-hidden').removeClass('d-none')
                kk = $(this).find(':selected').data('kk');
                umur = $(this).find(':selected').data('umur');
                berobat = $(this).find(':selected').data('berobat');
                gender = $(this).find(':selected').data('gender');
                $('#no_rm_temp').val($(this).val());
                $('#nama_kk_temp').val(kk);
                $('#umur_temp').val(umur);
                $('#id-berobat').val(berobat);
                $('#gender_temp').val(gender);
            })
        })
    </script>
@endsection
