<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'title' => 'Profile',
            'root' => true,
            'icon' => 'media/svg/icons/General/User.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'profile',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Fitur Utama',
        ],
        [
            'title' => 'Daftar Pasien',
            'root' => true,
            'icon' => 'media/svg/icons/General/User.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'pasien',
            'new-tab' => false,
        ],
        [
            'title' => 'Pendaftaran Berobat',
            'root' => true,
            'icon' => 'media/svg/icons/Communication/Add-user.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'berobat/pendaftaran',
            'new-tab' => false,
        ],
        /* [
            'title' => 'Cetak Kartu Pasien',
            'root' => true,
            'icon' => 'media/svg/icons/Communication/Address-card.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/cetak-kartu',
            'new-tab' => false,
        ], */
        [
            'title' => 'Laporan',
            'root' => true,
            'icon' => 'media/svg/icons/Communication/Archive.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'laporan/pelayanan',
            'new-tab' => false,
        ],
    ]

];
