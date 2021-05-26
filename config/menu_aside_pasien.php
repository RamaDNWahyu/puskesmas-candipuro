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
            'title' => 'Daftar Berobat',
            'root' => true,
            'icon' => 'media/svg/icons/Files/File-plus.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'berobat',
            'new-tab' => false,
        ],
        [
            'title' => 'Rekam Medis',
            'root' => true,
            'icon' => 'media/svg/icons/Files/Folder-heart.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'rekam-medis',
            'new-tab' => false,
        ],
    ]

];
