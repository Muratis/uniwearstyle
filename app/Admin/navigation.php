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
        'priority' => 600
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
        'title' => 'Размеры',
        'url'   => 'admin/sizes',
    ],


    [
        'title' => 'KPI Style',
        'icon'  => 'fa fa-university',
        'pages' => [
            [
                'title' => 'Футболки',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/tshirts?university=kpi',
            ],
            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/poloes?university=kpi',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts?university=kpi',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies?university=kpi',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers?university=kpi',
            ],
            [
                'title' => 'Новости',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/articles?university=kpi',
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
                'url'   => 'admin/tshirts?university=knu',
            ],
            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/poloes?university=knu',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts?university=knu',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies?university=knu',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers?university=knu',
            ],
            [
                'title' => 'Новости',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/articles?university=knu',
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
                'url'   => 'admin/tshirts?university=nmu',
            ],
            [
                'title' => 'Поло',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/poloes?university=nmu',
            ],
//
            [
                'title' => 'Свитшоты',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/sweatshirts?university=nmu',
            ],
//
            [
                'title' => 'Худи',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/hoodies?university=nmu',
            ],
//
            [
                'title' => 'Бомберы',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/bombers?university=nmu',
            ],
            [
                'title' => 'Новости',
//                'icon'  => 'fa fa-file-text-o',
                'url'   => 'admin/articles?university=nmu',
            ],
        ],
    ],



    [
        'title' => 'Пользователи',
        'icon' => 'fa fa-group',
        'pages' => [
            [
                'title' => 'Пользователи',
                'icon'  => 'fa fa-group',
                'url'   => 'admin/users',
            ],
            [
                'title' => 'Роли',
                'icon'  => 'fa fa-graduation-cap',
                'url'   => 'admin/roles',
            ],
            [
                'title' => 'Права',
                'icon'  => 'fa fa-key',
                'url'   => 'admin/permits',
            ],

        ],
        'priority' => 150

    ],


    [
        'title' => 'Заказы' ,
        'icon' => 'fa fa-group',
        'pages' => [
            [
            'title' => 'Активные заказы' ,
            'icon' => 'fa fa-group',
            'url' => 'admin/orders?is_active=0', 
                'priority' => 0,
            ],
            [
                'title' => 'Архив заказов' ,
                'icon' => 'fa fa-group',
                'url' => 'admin/orders?is_active=1',
            ],
        ],


        'priority' => 0,

    ],


];