<?php

use App\Models\shoppingUsers;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(shoppingUsers::class, function (ModelConfiguration $model) {

	$model->setTitle('Заказ');

	$model->setAlias('orders');

	$model->onDisplay(function () {
		$display = AdminDisplay::table();

		$display->setFilters(
				AdminDisplayFilter::field('is_active')
			)
			->setColumns([

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
			]);

		$display->paginate(10);
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