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
        'title' => 'Доступні розміри',
        'icon'  => 'fa fa-expand',
        'url'   => 'admin/sizes',
    ],

    [
        'title' => 'Відгуки покупців',
        'icon'  => 'fa fa-archive',
        'url'   => 'admin/reviews',
    ],

    [
        'title' => 'Каталог',
        'icon'  => 'fa fa-shopping-cart ',
        'pages' => [
                        [
                'title' => 'Футболки',
//                'icon'  => 'fa  fa-cart-plus',
                'url'   => 'admin/tshirts',
            ],

            [
                'title' => 'Поло',
//                'icon'  => 'fa  fa-cart-plus',
                'url'   => 'admin/poloes',
            ],

                        [
                'title' => 'Світшоти',
//              'icon'  => 'fa  fa-cart-plus',
                'url'   => 'admin/sweatshirts?university',
            ],
//
            [
                'title' => 'Худі',
//                'icon'  => 'fa  fa-cart-plus',
                'url'   => 'admin/hoodies?university',
            ],
//
            [
                'title' => 'Бомбери',
//                'icon'  => 'fa  fa-cart-plus',
                'url'   => 'admin/bombers?university',
            ],
        ]

],

    [
        'title' => 'Новини',
        'icon'  => 'fa fa-newspaper-o',
        'url'   => 'admin/articles',
    ],

    [
        'title' => 'Слайди',
        'icon'  => 'fa fa-picture-o ',
        'url'   => 'admin/slides',
    ],




    [
        'title' => 'Користувачі',
        'icon' => 'fa fa-group',
        'pages' => [
            [
                'title' => 'Користувачі',
                'icon'  => 'fa fa-group',
                'url'   => 'admin/users',
            ],
            [
                'title' => 'Ролі',
                'icon'  => 'fa fa-graduation-cap',
                'url'   => 'admin/roles',
                'id'   => 'rolew'
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
        'title' => 'Замовлення' ,
        'icon' => 'fa fa-address-book',
        'url' => 'admin/orders',
        'priority' => 0
    ],


];