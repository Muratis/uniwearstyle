<?php

use App\Models\Carts;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Carts::class, function (ModelConfiguration $model) {

	$model->setTitle('Заказы');
	$model->setAlias('orders_disabled');
	$model->onDisplay(function () {
		$display = AdminDisplay::table()
			->setFilters(
				AdminDisplayFilter::field('is_active')->setOperator('not_in')
			)
			->setColumns([
				AdminColumn::text('user_id', 'Номер заказа')->setWidth('200px'),
				AdminColumn::text('first_name', 'Имя'),
				AdminColumn::text('last_name', 'Фамилия'),
				AdminColumn::text('methodPost', 'Отправка'),
				AdminColumn::text('city', 'Город'),
				AdminColumn::text('address', 'Адресс/Отделение'),
				AdminColumn::text('phone', 'Телефон'),
				AdminColumn::url('identifier', 'Заказ'),
				AdminColumnEditable::checkbox('is_active', 'не активный', 'активный')->setLabel('Активность заказа')->setWidth('30px'),
//			AdminColumn::lists($cg, 'Заказ'),
				AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
			]);
		$display->paginate(10)
			->setApply( function ($query) {
				$query->orderBy('user_id', '0');
			});
		return $display;
	});


	$model->onEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('title', 'Название новости')->required(),
			AdminFormElement::image('image', 'Картинка для новости')->required(),
			AdminFormElement::textarea('text', 'Текс новости')->required()
		);
		return $form;
	});




});