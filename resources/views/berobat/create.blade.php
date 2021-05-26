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
      Tambah Pasien Berobat
     </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="{{ url('berobat') }}">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Silahkan isi informasi obat dengan benar dan lengkap.
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label text-right">Pasien</label>
       <div class="col-10">
        <select class="form-control" name="no_rm" id="no_rm">
            <option></option>
            @foreach ($pasien as $s)
                <option data-kepesertaan="{{$s->kepesertaan}}" data-kk="{{ $s->nama_kk }}" data-umur="{{ \Carbon\Carbon::parse($s->tanggal_lahir)->age }}" value="{{ $s->no_rm }}">{{ $s->name }}</option>
            @endforeach
        </select>
        @error('no_rm')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
       </div>
      </div>
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
            <label for="example-search-input" class="col-2 col-form-label text-right">Kunjungan</label>
            <div class="col-10">
                <input type="text" readonly id="kunjungan_temp" class="form-control" value="KIA">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label text-right">Umur</label>
            <div class="col-10">
                <input type="number" readonly id="umur_temp" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label text-right">Rujukan?</label>
            <div class="col-10">
                <label for="">Pilih salah satu:</label>
                <div class="radio-inline">
                    <label class="radio radio-danger radio-lg">
                    <input type="radio" @if(old('rujukan') == '0') checked="checked" @endif name="rujukan" value="0">
                    <span></span>Tidak</label>

                    <label class="radio radio-lg">
                    <input @if(old('rujukan') == '1') checked="checked" @endif type="radio" name="rujukan" value="1">
                    <span></span>Iya</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label text-right">Kepesertaan?</label>
            <div class="col-10">
                <select name="kepesertaan" class="form-control" id="kepesertaan-select">
                    <option value="PBI">PBI</option>
                    <option value="NON PBI">NON PBI</option>
                    <option value="UMUM">UMUM</option>
                </select>
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
    <script src="/js/pages/crud/forms/widgets/select2.js"></script>
    <script>
        var kk, umur;
        $(document).ready(function () {
            $('#no_rm').select2({
                placeholder: 'Pilih Pasien'
            })

            $('#no_rm').on('change', function () {
                $('#row-hidden').removeClass('d-none')
                kk = $(this).find(':selected').data('kk');
                umur = $(this).find(':selected').data('umur');
                kepesertaan = $(this).find(':selected').data('kepesertaan');
                $('#no_rm_temp').val($(this).val());
                $('#nama_kk_temp').val(kk);
                $('#umur_temp').val(umur);
                $('#kepesertaan-select').val(kepesertaan);
            })
        })
    </script>
@endsection
