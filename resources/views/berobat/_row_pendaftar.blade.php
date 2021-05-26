
@foreach ($yang_berobat as $y)
<div class="d-flex align-items-center mb-5">
    <!--begin::Symbol-->
    <div class="symbol symbol-40 symbol-light-white mr-5">
        <div class="symbol-label">
            <img src="@if($y->pasien->gender == 'Lelaki') /media/svg/avatars/008-boy-3.svg @else /media/svg/avatars/002-girl.svg @endif" class="h-75 align-self-end" alt="">
        </div>
    </div>
    <!--end::Symbol-->
    <!--begin::Text-->
    <div class="d-flex flex-column font-weight-bold">
        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">@if($y->no_rm == $data->no_rm) {{ $y->pasien->name }} @else {{ Str::limit($y->pasien->name, 3) }} @endif</a>
        <span class="text-muted">No Urut : {{ $y->no_urut }}</span>
    </div>
    <!--end::Text-->
</div>
@endforeach
