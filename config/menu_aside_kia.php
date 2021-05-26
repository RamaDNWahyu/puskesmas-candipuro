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
            'title' => 'Daftar Kunjungan KIA',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Github.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'daftar-kunjungan-kia',
            'new-tab' => false,
        ],
        /* [
            'title' => 'Waktu Pemeriksaan',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Time-schedule.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/waktu-pemeriksaan',
            'new-tab' => false,
        ], */
        [
            'title' => 'Obat',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Box3.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'obat',
            'new-tab' => false,
        ],
    ]

];
