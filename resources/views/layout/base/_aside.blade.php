{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
                @if (auth()->user()->role == config('role.PASIEN'))
                @if (
                    auth()->user()->nama_kk != null ||
                    auth()->user()->tanggal_lahir == null ||
                    auth()->user()->alamat == null ||
                    auth()->user()->pekerjaan == null
                )
                {{ Menu::renderVerMenu(config('menu_aside_pasien.items')) }}
                @endif
                @elseif (auth()->user()->role == config('role.KEPALA_PUSKES'))
                {{ Menu::renderVerMenu(config('menu_aside_kepala.items')) }}
                @elseif (auth()->user()->role == config('role.PETUGAS_KIA'))
                {{ Menu::renderVerMenu(config('menu_aside_kia.items')) }}
                @elseif (auth()->user()->role == config('role.PETUGAS_MEDIS'))
                {{ Menu::renderVerMenu(config('menu_aside_medis.items')) }}
                @elseif (auth()->user()->role == config('role.PETUGAS_PELAYANAN'))
                {{ Menu::renderVerMenu(config('menu_aside_pelayanan.items')) }}
                @else
                {{ Menu::renderVerMenu(config('menu_aside.items')) }}
                @endif
            </ul>
        </div>
    </div>

</div>
