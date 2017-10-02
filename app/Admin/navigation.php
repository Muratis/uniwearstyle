<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [

    [
        'title' => 'Выйти',
        'icon'  => 'fa fa-sign-out',
        'url'   => '/',
    ],

    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    [
        'title' => 'KPI Style',
        'icon'  => 'fa fa-university',
        'pages' => [
            [
                'title' => 'Футболки',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/tshirts_kpi',
            ],

            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/polo_kpi',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts_kpi',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies_kpi',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers_kpi',
            ],
            
        ],
    ],
    
    [
    'title' => 'KNEU Style',
    'icon'  => 'fa fa-university',
    'pages' => [
        [
            'title' => 'Футболки',
//                'icon'  => 'fa fa-file-text-o',
            'url'   => 'admin/tshirts_kneu',
        ],

            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/polo_kneu',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts_kneu',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
            'url'   => 'admin/hoodies_kneu',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers_kneu',
            ],

    ],

],

    [
        'title' => 'KNU Style',
        'icon'  => 'fa fa-university',
        'pages' => [
            [
                'title' => 'Футболки',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/tshirts_knu',
            ],

            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/polo_knu',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts_knu',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies_knu',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers_knu',
            ],

        ],

    ],

    [
        'title' => 'NMU Style',
        'icon'  => 'fa fa-university',
        'pages' => [
            [
                'title' => 'Футболки',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/tshirts_nmu',
            ],

            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/polo_nmu',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts_nmu',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies_nmu',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers_nmu',
            ],

        ],

    ],



];