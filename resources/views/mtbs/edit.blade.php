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
<form method="POST" action="{{ url('mtbs/' . $data->id) }}">
@csrf
@method('PUT')
<div class="card card-custom mb-5">
    <div class="card-header">
     <h3 class="card-title">
      Tambah MTBS KIA
     </h3>
    </div>
    <div class="card-body">
        <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
            <div class="alert-text">
             Silahkan isi informasi pasien ibu/anak dengan benar dan lengkap, sesuai dengan <code>informasi</code> yang diberikan.
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Tanggal MTBS</label>
            <div class="col-9">
                <input type="date" value="{{ old('tanggal',$data->tanggal) }}" class="form-control @error('tanggal') is-invalid @endif" name="tanggal" placeholder="Nama anak yang berobat">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Nama Pasien</label>
            <div class="col-9">
                <input type="text" class="form-control" readonly value="{{ $data->pasien->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Nama Anak</label>
            <div class="col-9">
                <input type="text" value="{{ old('nama_anak', $data->nama_anak) }}" readonly class="form-control @error('nama_anak') is-invalid @endif" name="nama_anak" placeholder="Nama anak yang berobat">
                @error('nama_anak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Umur Anak</label>
            <div class="col-9">
                <div class="input-group">
                    <input type="number" value="{{ old('umur_anak', $data->umur_anak) }}" class="form-control @error('umur_anak') is-invalid @endif" name="umur_anak" placeholder="Umur anak yang berobat">
                    <div class="input-group-append">
                        <span class="input-group-text">tahun</span>
                    </div>
                </div>

                @error('umur_anak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Jenis Kelamin</label>
            <div class="col-9">
                <select name="gender" class="form-control @error('gender') is-invalid @endif">
                    <option value="" disabled>Pilih Gender</option>
                    <option value="Laki-laki" @if(old('gender', $data->gender) == 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if(old('gender',  $data->gender) == 'Perempuan') selected @endif>Perempuan</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="align-self-center text-right col-form-label col-3">Informasi keadaan pasien</label>
            <div class="col-3">
                <label for="" class="col-form-label">Berat Badan</label>
                <div class="input-group">
                    <input type="number" value="{{ old('berat_badan', $data->berat_badan) }}" class="form-control @error('berat_badan') is-invalid @endif" name="berat_badan" placeholder="Berat badan pasien">
                    <div class="input-group-append">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>

                @error('berat_badan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Tinggi Badan</label>
                <div class="input-group">
                    <input type="number" value="{{ old('tinggi', $data->tinggi) }}" class="form-control @error('tinggi') is-invalid @endif" name="tinggi" placeholder="Tinggi badan pasien">
                    <div class="input-group-append">
                        <span class="input-group-text">cm</span>
                    </div>
                </div>

                @error('tinggi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Suhu Badan</label>
                <div class="input-group">
                    <input type="number" value="{{ old('suhu', $data->suhu) }}" class="form-control @error('suhu') is-invalid @endif" name="suhu" placeholder="Suhu badan pasien">
                    <div class="input-group-append">
                        <span class="input-group-text">°C</span>
                    </div>
                </div>
                @error('suhu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="align-self-center text-right col-form-label col-3">Informasi Kunjungan</label>
            <div class="col-5">
                <label for="" class="col-form-label">Kunjungan Pertama?</label>
                <select name="kunjungan_pertama" id="" class="form-control">
                    <option @if(old('kunjungan_pertama', $data->kunjungan_pertama) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('kunjungan_pertama', $data->kunjungan_pertama) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('kunjungan_pertama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="" class="col-form-label">Kunjungan Ulang?</label>
                <select name="kunjungan_ulang" id="" class="form-control">
                    <option @if(old('kunjungan_ulang', $data->kunjungan_ulang) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('kunjungan_ulang', $data->kunjungan_ulang) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('kunjungan_ulang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="card card-custom mb-5">
    <div class="card-header">
        <h3 class="card-header">
            Informasi Keluhan Pasien
        </h3>
    </div>
    <div class="card-body">
        <div class="alert alert-custom alert-default" role="alert">
            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
            <div class="alert-text">
                 Informasi keluhan dan tanda - tanda bahaya umum yang dialami pasien.
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Keluhan</label>
            <div class="col-9">
                <textarea class="form-control @error('keluhan') is-invalid @endif" name="keluhan" placeholder="Ketikan seluruh keluhan yang pasien berikan">{{ old('keluhan', $data->keluhan) }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Tanda Bahaya Umum</label>
            <div class="col-9">
                <select class="form-control @error('tanda_bahaya') is-invalid @enderror" name="tanda_bahaya[]" multiple id="select-tanda-bahaya">
                    <option {{ (collect(old('tanda_bahaya', explode(',',$data->tanda_bahaya)))->contains("Tidak bisa minum atau menyusu")) ? 'selected':'' }} value="Tidak bisa minum atau menyusu">Tidak bisa minum atau menyusu</option>
                    <option {{ (collect(old('tanda_bahaya', explode(',',$data->tanda_bahaya)))->contains("Memuntahkan semuanya")) ? 'selected':'' }} value="Memuntahkan semuanya">Memuntahkan semuanya</option>
                    <option {{ (collect(old('tanda_bahaya', explode(',',$data->tanda_bahaya)))->contains("Kejang")) ? 'selected':'' }} value="Kejang">Kejang</option>
                    <option {{ (collect(old('tanda_bahaya', explode(',',$data->tanda_bahaya)))->contains("Letangis atau Tidak sadar")) ? 'selected':'' }} value="Letangis atau Tidak sadar">Letangis atau Tidak sadar</option>
                </select>
                @error('tanda_bahaya')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="align-self-center text-right col-form-label col-3">Apakah Pasien Batuk</label>
            <div class="col-4">
                <label for="" class="col-form-label">Batuk?</label>
                <select name="batuk" id="" class="form-control @error('batuk') is-invalid @enderror">
                    <option @if(old('batuk', $data->batuk) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('batuk', $data->batuk) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('batuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-5">
                <label for="" class="col-form-label">Berapa Hari?</label>
                <input type="number" name="batuk_lama" class="form-control @error('batuk_lama') is-invalid @enderror" value="{{ old('batuk_lama', $data->batuk_lama) }}">
                @error('batuk_lama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="align-self-center text-right col-form-label col-3">Apakah Pasien Demam</label>
            <div class="col-3">
                <label for="" class="col-form-label">Demam?</label>
                <select name="demam" id="" class="form-control @error('demam') is-invalid @enderror">
                    <option @if(old('demam', $data->demam) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('demam', $data->demam) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('demam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Berapa Hari Demamnya?</label>
                <input type="number" class="form-control @error('demam_lama') is-invalid @enderror" name="demam_lama" value="{{ old('demam_lama', $data->demam_lama) }}">
                @error('demam_lama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Apakah Tiap Hari?</label>
                <select name="demam_tiap_hari" id="" class="form-control @error('demam_tiap_hari') is-invalid @enderror">
                    <option @if(old('demam_tiap_hari', $data->demam_tiap_hari) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('demam_tiap_hari', $data->demam_tiap_hari) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('demam_tiap_hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="align-self-center text-right col-form-label col-3">Apakah Pasien Diare?</label>
            <div class="col-3">
                <label for="" class="col-form-label">Diare?</label>
                <select name="diare" id="" class="form-control @error('diare') is-invalid @enderror">
                    <option @if(old('diare', $data->diare) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('diare', $data->diare) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('demam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Berapa Hari Diarenya?</label>
                <input type="number" class="form-control @error('diare_lama') is-invalid @enderror" name="diare_lama" value="{{ old('diare_lama', $data->diare_lama) }}">
                @error('diare_lama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="col-form-label">Apakah Eksresinya berdarah?</label>
                <select name="darah_demam" id="" class="form-control @error('darah_demam') is-invalid @enderror">
                    <option @if(old('darah_demam', $data->darah_demam) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('darah_demam', $data->darah_demam) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('darah_demam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Klasifikasi Pasien
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Klasifikasi Tanda Umum</label>
            <div class="col-9">
                <select name="klasifikasi_bahaya_umum" id="" class="form-control @error('klasifikasi_bahaya_umum') is-invalid @enderror">
                    <option @if(old('klasifikasi_bahaya_umum', $data->klasifikasi_bahaya_umum) == 0) selected @endif value="0">Tidak</option>
                    <option @if(old('klasifikasi_bahaya_umum', $data->klasifikasi_bahaya_umum) == 1) selected @endif value="1">Iya</option>
                </select>
                @error('tanda_bahaya')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Tindakan Tanda Umum</label>
            <div class="col-9">
                <textarea class="form-control @error('tindakan_bahaya_umum') is-invalid @endif" name="tindakan_bahaya_umum" placeholder="Tindakan terhadap tanda - tanda bahaya umum">{{ old('tindakan_bahaya_umum', $data->tindakan_bahaya_umum) }}</textarea>
                @error('tindakan_bahaya_umum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Hasil RDT</label>
            <div class="col-9">
                <textarea class="form-control @error('hasil_rdt') is-invalid @endif" name="hasil_rdt" placeholder="Hasil RDT">{{ old('hasil_rdt', $data->hasil_rdt) }}</textarea>
                @error('hasil_rdt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-3 text-right">Hasil SDM</label>
            <div class="col-9">
                <textarea class="form-control @error('hasil_sdm') is-invalid @endif" name="hasil_sdm" placeholder="Hasil SDM">{{ old('hasil_sdm', $data->hasil_sdm) }}</textarea>
                @error('hasil_sdm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
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
        $(document).ready(function () {
            $('#select-rm').select2({
                placeholder: 'Pilih Pasien',
                width: 'resolve'
            })
            $('#select-tanda-bahaya').select2({
                placeholder: 'Pilih Tanda Bahaya',
                width: 'resolve'
            })
        })
    </script>
@endsection
