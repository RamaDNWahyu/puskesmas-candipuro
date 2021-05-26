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
            'title' => 'Laporan',
            'root' => true,
            'icon' => 'media/svg/icons/Communication/Archive.svg', // or can be 'flaticon-home' or any flaticon-*
            'bullet' => 'line',
            'submenu' => [
                [
                    'title' => 'Pelayanan',
                    'root' => true,
                    'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                    'page' => 'laporan/pelayanan',
                    'new-tab' => false,
                ],
            ],
            'new-tab' => false,
        ],
    ]

];
