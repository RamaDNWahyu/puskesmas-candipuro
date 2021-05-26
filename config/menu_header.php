<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'title' => 'Profil Anda',
            'root' => true,
            'page' => '/profile',
            'new-tab' => false,
        ],
        /* [
            'title' => 'Features',
            'root' => true,
            'toggle' => 'click',
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                'items' => [
                    [
                        'title' => 'Bootstrap',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Communication/Add-user.svg', // or can be 'flaticon-light' or any flaticon-*
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Utilities',
                                'page' => 'features/bootstrap/utilities'
                            ],
                            [
                                'title' => 'Typography',
                                'page' => 'features/bootstrap/typography'
                            ],
                            [
                                'title' => 'Buttons',
                                'page' => 'features/bootstrap/buttons'
                            ],
                            [
                                'title' => 'Button Group',
                                'page' => 'features/bootstrap/button-group'
                            ],
                            [
                                'title' => 'Dropdown',
                                'page' => 'features/bootstrap/dropdown'
                            ],
                            [
                                'title' => 'Navs',
                                'page' => 'features/bootstrap/navs'
                            ],
                            [
                                'title' => 'Tables',
                                'page' => 'features/bootstrap/tables'
                            ],
                            [
                                'title' => 'Progress',
                                'page' => 'features/bootstrap/progress'
                            ],
                            [
                                'title' => 'Modal',
                                'page' => 'features/bootstrap/modal'
                            ],
                            [
                                'title' => 'Alerts',
                                'page' => 'features/bootstrap/alerts'
                            ],
                            [
                                'title' => 'Popover',
                                'page' => 'features/bootstrap/popover'
                            ],
                            [
                                'title' => 'Tooltip',
                                'page' => 'features/bootstrap/tooltip'
                            ],
                        ]
                    ],
                    [
                        'title' => 'Custom',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Files/Pictures1.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Utilities',
                                'page' => 'features/custom/utilities'
                            ],
                            [
                                'title' => 'Accordions',
                                'page' => 'features/custom/accordions'
                            ],
                            [
                                'title' => 'Label',
                                'page' => 'features/custom/labels'
                            ],
                            [
                                'title' => 'Line Tabs',
                                'page' => 'features/custom/line-tabs'
                            ],
                            [
                                'title' => 'Advance Navigations',
                                'page' => 'features/custom/advance-navs'
                            ],
                            [
                                'title' => 'Timeline',
                                'page' => 'features/custom/timeline'
                            ],
                            [
                                'title' => 'Pagination',
                                'page' => 'features/custom/pagination'
                            ],
                            [
                                'title' => 'Media',
                                'page' => 'features/custom/media'
                            ],
                            [
                                'title' => 'Spinners',
                                'page' => 'features/custom/spinners'
                            ],
                            [
                                'title' => 'Iconbox',
                                'page' => 'features/custom/iconbox'
                            ],
                            [
                                'title' => 'Callout',
                                'page' => 'features/custom/callout'
                            ],
                            [
                                'title' => 'Ribbons',
                                'page' => 'features/custom/ribbons'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Icons',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Communication/Address-card.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Flaticon',
                                'page' => 'features/icons/flaticon'
                            ],
                            [
                                'title' => 'Fontawesome 5',
                                'page' => 'features/icons/fontawesome5'
                            ],
                            [
                                'title' => 'Lineawesome',
                                'page' => 'features/icons/lineawesome'
                            ],
                            [
                                'title' => 'Socicons',
                                'page' => 'features/icons/socicons'
                            ],
                            [
                                'title' => 'SVG Icons',
                                'page' => 'features/svg/icons'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Cards',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Communication/Adress-book2.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'General Cards',
                                'page' => 'features/cards/general'
                            ],
                            [
                                'title' => 'Stacked Cards',
                                'page' => 'features/cards/stacked'
                            ],
                            [
                                'title' => 'Tabbed Cards',
                                'page' => 'features/cards/tabbed'
                            ],
                            [
                                'title' => 'Draggable Cards',
                                'page' => 'features/cards/draggable'
                            ],
                            [
                                'title' => 'Cards Tools',
                                'page' => 'features/cards/tools'
                            ],
                            [
                                'title' => 'Sticky Cards',
                                'page' => 'features/cards/sticky'
                            ],
                            [
                                'title' => 'Stretched Cards',
                                'page' => 'features/cards/stretched'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Widgets',
                        'desc' => 'dashboard widget examples',
                        'icon' => 'media/svg/icons/Communication/Chat1.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Lists',
                                'page' => 'features/widgets/lists'
                            ],
                            [
                                'title' => 'Stats',
                                'page' => 'features/widgets/stats'
                            ],
                            [
                                'title' => 'Charts',
                                'page' => 'features/widgets/charts'
                            ],
                            [
                                'title' => 'Charts',
                                'page' => 'features/widgets/charts'
                            ],
                            [
                                'title' => 'Mixed',
                                'page' => 'features/widgets/mixed',
                            ],
                            [
                                'title' => 'Tiles',
                                'page' => 'features/widgets/tiles',
                            ],
                            [
                                'title' => 'Engage',
                                'page' => 'features/widgets/engage',
                            ],
                            [
                                'title' => 'Tables',
                                'page' => 'features/widgets/tables',
                            ],
                            [
                                'title' => 'Forms',
                                'page' => 'features/widgets/forms',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Calendar',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Communication/Chat-check.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Basic Calendar',
                                'page' => 'features/calendar/basic'
                            ],
                            [
                                'title' => 'List Views',
                                'page' => 'features/calendar/list-view'
                            ],
                            [
                                'title' => 'Google Calendar',
                                'page' => 'features/calendar/google'
                            ],
                            [
                                'title' => 'External Events',
                                'page' => 'features/calendar/external-events'
                            ],
                            [
                                'title' => 'Background Events',
                                'page' => 'features/calendar/background-events'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Charts',
                        'icon' => 'media/svg/icons/Communication/Dial-numbers.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'amCharts',
                                'bullet' => 'dot',
                                'submenu' => [
                                    [
                                        'title' => 'amCharts Charts',
                                        'page' => 'features/charts/amcharts/charts'
                                    ],
                                    [
                                        'title' => 'amCharts Stock Charts',
                                        'page' => 'features/charts/amcharts/stock-charts'
                                    ],
                                    [
                                        'title' => 'amCharts Maps',
                                        'page' => 'features/charts/amcharts/maps'
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Flot Charts',
                                'page' => 'features/charts/flotcharts'
                            ],
                            [
                                'title' => 'Google Charts',
                                'page' => 'features/charts/google-charts'
                            ],
                            [
                                'title' => 'Morris Charts',
                                'page' => 'features/charts/morris-charts'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Maps',
                        'icon' => 'media/svg/icons/Communication/Incoming-box.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Google Maps',
                                'page' => 'features/maps/google-maps'
                            ],
                            [
                                'title' => 'JQVMap',
                                'page' => 'features/maps/jqvmap'
                            ],
                        ]
                    ],
                    [
                        'title' => 'Miscellaneous',
                        'desc' => '',
                        'icon' => 'media/svg/icons/Communication/Active-call.svg',
                        'bullet' => 'dot',
                        'submenu' => [
                            [
                                'title' => 'Kanban Board',
                                'page' => 'features/miscellaneous/kanban-board'
                            ],
                            [
                                'title' => 'Sticky Panels',
                                'page' => 'features/miscellaneous/sticky-panels'
                            ],
                            [
                                'title' => 'Block UI',
                                'page' => 'features/miscellaneous/blockui'
                            ],
                            [
                                'title' => 'Perfect Scrollbar',
                                'page' => 'features/miscellaneous/perfect-scrollbar'
                            ],
                            [
                                'title' => 'Tree View',
                                'page' => 'features/miscellaneous/treeview'
                            ],
                            [
                                'title' => 'Bootstrap Notify',
                                'page' => 'features/miscellaneous/bootstrap-notify'
                            ],
                            [
                                'title' => 'Toastr',
                                'page' => 'features/miscellaneous/toastr'
                            ],
                            [
                                'title' => 'SweetAlert2',
                                'page' => 'features/miscellaneous/sweetalert2'
                            ],
                            [
                                'title' => 'Dual Listbox',
                                'page' => 'features/miscellaneous/dual-listbox'
                            ],
                            [
                                'title' => 'Session Timeout',
                                'page' => 'features/miscellaneous/session-timeout'
                            ],
                            [
                                'title' => 'Idle Timer',
                                'page' => 'features/miscellaneous/idle-timer'
                            ]
                        ]
                    ],
                ]
            ]
        ], */
        /* [
            'title' => 'Apps',
            'root' => true,
            'toggle' => 'click',
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                'items' => [
                    [
                        'title' => 'Users',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Communication/Address-card.svg',
                        'submenu' => [
                            [
                                'title' => 'List - Default',
                                'page' => 'custom/apps/user/list-default'
                            ],
                            [
                                'title' => 'List - Datatable',
                                'page' => 'custom/apps/user/list-datatable'
                            ],
                            [
                                'title' => 'List - Columns 1',
                                'page' => 'custom/apps/user/list-columns-1'
                            ],
                            [
                                'title' => 'List - Columns 2',
                                'page' => 'custom/apps/user/list-columns-2'
                            ],
                            [
                                'title' => 'Add User',
                                'page' => 'custom/apps/user/add-user'
                            ],
                            [
                                'title' => 'Edit User',
                                'page' => 'custom/apps/user/edit-user'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Profile',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Communication/Address-card.svg',
                        'submenu' => [
                            [
                                'title' => 'Profile 1',
                                'bullet' => 'line',
                                'submenu' => [
                                    [
                                        'title' => 'Overview',
                                        'page' => 'custom/apps/profile/profile-1/overview'
                                    ],
                                    [
                                        'title' => 'Personal Information',
                                        'page' => 'custom/apps/profile/profile-1/personal-information'
                                    ],
                                    [
                                        'title' => 'Account Information',
                                        'page' => 'custom/apps/profile/profile-1/account-information'
                                    ],
                                    [
                                        'title' => 'Change Password',
                                        'page' => 'custom/apps/profile/profile-1/change-password'
                                    ],
                                    [
                                        'title' => 'Email Settings',
                                        'page' => 'custom/apps/profile/profile-1/email-settings'
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Profile 2',
                                'page' => 'custom/apps/profile/profile-2'
                            ],
                            [
                                'title' => 'Profile 3',
                                'page' => 'custom/apps/profile/profile-3'
                            ],
                            [
                                'title' => 'Profile 4',
                                'page' => 'custom/apps/profile/profile-4'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Contacts',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Communication/Adress-book1.svg',
                        'submenu' => [
                            [
                                'title' => 'List - Columns',
                                'page' => 'custom/apps/contacts/list-columns'
                            ],
                            [
                                'title' => 'List - Datatable',
                                'page' => 'custom/apps/contacts/list-datatable'
                            ],
                            [
                                'title' => 'View Contact',
                                'page' => 'custom/apps/contacts/view-contact'
                            ],
                            [
                                'title' => 'Add Contact',
                                'page' => 'custom/apps/contacts/add-contact'
                            ],
                            [
                                'title' => 'Edit Contact',
                                'page' => 'custom/apps/contacts/edit-cotact'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Chat',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Communication/Mail-opened.svg',
                        'submenu' => [
                            [
                                'title' => 'Private',
                                'page' => 'custom/apps/chat/private'
                            ],
                            [
                                'title' => 'Group',
                                'page' => 'custom/apps/chat/group'
                            ],
                            [
                                'title' => 'Popup',
                                'page' => 'custom/apps/chat/popup'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Projects',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Shopping/Box2.svg',
                        'submenu' => [
                            [
                                'title' => 'List - Columns 1',
                                'page' => 'custom/apps/projects/list-columns-1'
                            ],
                            [
                                'title' => 'List - Columns 2',
                                'page' => 'custom/apps/projects/list-columns-2'
                            ],
                            [
                                'title' => 'List - Columns 3',
                                'page' => 'custom/apps/projects/list-columns-3'
                            ],
                            [
                                'title' => 'List - Columns 4',
                                'page' => 'custom/apps/projects/list-columns-4'
                            ],
                            [
                                'title' => 'List - Datatable',
                                'page' => 'custom/apps/projects/list-datatable'
                            ],
                            [
                                'title' => 'View Project',
                                'page' => 'custom/apps/projects/view-project'
                            ],
                            [
                                'title' => 'Add Project',
                                'page' => 'custom/apps/projects/add-project'
                            ],
                            [
                                'title' => 'Edit Project',
                                'page' => 'custom/apps/projects/edit-project'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Support Center',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/General/Shield-check.svg',
                        'submenu' => [
                            [
                                'title' => 'Home 1',
                                'page' => 'custom/apps/support-center/home-1'
                            ],
                            [
                                'title' => 'Home 2',
                                'page' => 'custom/apps/support-center/home-2'
                            ],
                            [
                                'title' => 'FAQ 1',
                                'page' => 'custom/apps/support-center/faq-1'
                            ],
                            [
                                'title' => 'FAQ 2',
                                'page' => 'custom/apps/support-center/faq-2'
                            ],
                            [
                                'title' => 'FAQ 3',
                                'page' => 'custom/apps/support-center/faq-3'
                            ],
                            [
                                'title' => 'Feedback',
                                'page' => 'custom/apps/support-center/feedback'
                            ],
                            [
                                'title' => 'License',
                                'page' => 'custom/apps/support-center/license'
                            ]
                        ]
                    ],

                    [
                        'title' => 'Todo',
                        'bullet' => 'dot',
                        'icon' => 'media/svg/icons/Communication/Clipboard-list.svg',
                        'submenu' => [
                            [
                                'title' => 'Tasks',
                                'page' => 'custom/apps/todo/tasks'
                            ],
                            [
                                'title' => 'Docs',
                                'page' => 'custom/apps/todo/docs'
                            ],
                            [
                                'title' => 'Files',
                                'page' => 'custom/apps/todo/files'
                            ]
                        ]
                    ],

                    [
                        'title' => 'Inbox',
                        'bullet' => 'dot',
                        'label' => [
                            'type' => 'label-danger label-inline',
                            'value' => 'new'
                        ],
                        'icon' => 'media/svg/icons/General/Shield-check.svg',
                        'title' => 'Inbox',
                        'page' => 'custom/apps/inbox'
                    ]
                ]
            ]
        ], */
        /* [
            'title' => 'Pages',
            'root' => true,
            'toggle' => 'click',
            'submenu' => [
                'type' => 'mega',
                'width' => '1000px',
                'alignment' => 'center',
                'columns' => [
                    [
                        'bullet' => 'line',
                        'heading' => [
                            'heading' => true,
                            'title' => 'Pricing Tables',
                            'desc' => '',
                        ],
                        'items' => [
                            [
                                'title' => 'Pricing Tables 1',
                                'page' => 'custom/pages/pricing/pricing-1'
                            ],
                            [
                                'title' => 'Pricing Tables 2',
                                'page' => 'custom/pages/pricing/pricing-2'
                            ],
                            [
                                'title' => 'Pricing Tables 3',
                                'page' => 'custom/pages/pricing/pricing-3'
                            ],
                            [
                                'title' => 'Pricing Tables 4',
                                'page' => 'custom/pages/pricing/pricing-4'
                            ]
                        ]
                    ],
                    [
                        'bullet' => 'line',
                        'heading' => [
                            'heading' => true,
                            'title' => 'Wizards',
                            'desc' => '',
                        ],
                        'items' => [
                            [
                                'title' => 'Wizard 1',
                                'page' => 'custom/pages/wizard/wizard-1'
                            ],
                            [
                                'title' => 'Wizard 2',
                                'page' => 'custom/pages/wizard/wizard-2'
                            ],
                            [
                                'title' => 'Wizard 3',
                                'page' => 'custom/pages/wizard/wizard-3'
                            ],
                            [
                                'title' => 'Wizard 4',
                                'page' => 'custom/pages/wizard/wizard-4'
                            ]
                        ]
                    ],
                    [
                        'bullet' => 'line',
                        'heading' => [
                            'heading' => true,
                            'title' => 'Invoices & FAQ',
                            'desc' => '',
                            'bullet' => 'dot',
                        ],
                        'items' => [
                            [
                                'title' => 'Invoice 1',
                                'page' => 'custom/pages/invoices/invoice-1'
                            ],
                            [
                                'title' => 'Invoice 2',
                                'page' => 'custom/pages/invoices/invoice-2'
                            ],
                            [
                                'title' => 'FAQ 1',
                                'page' => 'custom/pages/faq/faq-1'
                            ]
                        ]
                    ],
                    [
                        'bullet' => 'line',
                        'heading' => [
                            'heading' => true,
                            'title' => 'User Pages',
                            'bullet' => 'dot',
                        ],
                        'items' => [
                            [
                                'title' => 'Login 1',
                                'page' => 'custom/pages/user/login-1',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Login 2',
                                'page' => 'custom/pages/user/login-2',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Login 3',
                                'page' => 'custom/pages/user/login-3',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Login 4',
                                'page' => 'custom/pages/user/login-4',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Login 5',
                                'page' => 'custom/pages/user/login-5',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Login 6',
                                'page' => 'custom/pages/user/login-6',
                                'new-tab' => true
                            ]
                        ]
                    ],
                    [
                        'bullet' => 'line',
                        'heading' => [
                            'heading' => true,
                            'title' => 'Error Pages',
                            'bullet' => 'dot',
                        ],
                        'items' => [
                            [
                                'title' => 'Error 1',
                                'page' => 'custom/pages/errors/error-1',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Error 2',
                                'page' => 'custom/pages/errors/error-2',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Error 3',
                                'page' => 'custom/pages/errors/error-3',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Error 4',
                                'page' => 'custom/pages/errors/error-4',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Error 5',
                                'page' => 'custom/pages/errors/error-5',
                                'new-tab' => true
                            ],
                            [
                                'title' => 'Error 6',
                                'page' => 'custom/pages/errors/error-6',
                                'new-tab' => true
                            ]
                        ]
                    ]
                ]
            ]
        ] */
    ]

];
