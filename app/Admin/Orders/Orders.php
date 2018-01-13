<?php

use App\Repositories\CartRepository;
use App\Models\shoppingUsers;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(shoppingUsers::class, function (ModelConfiguration $model) {

	$this->order = new CartRepository();

	$model->setTitle('Заказ');

	$model->setAlias('orders');

		$model->onDisplay(function () {
			$display = AdminDisplay::tabbed();
			$display->SetTabs(function ()
			{
				$tabs = [];

				$columns = [
					AdminColumn::text('user_id', 'Номер заказа')->setWidth('200px'),
					AdminColumn::text('first_name', 'Имя'),
					AdminColumn::text('last_name', 'Фамилия'),
					AdminColumn::text('methodPost', 'Отправка'),
					AdminColumn::text('city', 'Город'),
					AdminColumn::text('address', 'Адресс/Отделение'),
					AdminColumn::text('phone', 'Телефон'),
					AdminColumn::url('user_carts.identifier', 'Заказ'),
					AdminColumnEditable::checkbox('is_active', 'не активный', 'активный')->setLabel('Активность заказа')->setWidth('30px'),
//			AdminColumn::lists($cg, 'Заказ'),
					AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')

				];

				$active = AdminDisplay::table();
				$active->setColumns($columns);
				$active->paginate(5)
					->setApply( function ($query) {
						$query->orderBy('user_id', '0');
						$query->where('is_active', '=', '0');
					});

				$tabs[] = AdminDisplay::tab($active, 'Актуальні')->setActive()->setBadge($this->order->getCountOrders());

				$archive = AdminDisplay::table();
				$archive->setColumns($columns);
				$archive->paginate(5)
					->setApply( function ($query) {
						$query->orderBy('user_id', '0');
						$query->where('is_active', '=', '1');
					});

				$tabs[] = AdminDisplay::tab($archive, 'Архів');


				return $tabs;
			});

			return $display;
		});




	$model->onEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('first_name', 'Имя')->required(),
			AdminFormElement::image('last_name', 'Фамилия')->required(),
			AdminFormElement::textarea('methodPost', 'Отправка')->required()
		);
		return $form;
	});




});