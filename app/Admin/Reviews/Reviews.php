<?php

use App\Repositories\ReviewRepository;
use App\Models\Reviews;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Reviews::class, function (ModelConfiguration $model) {

	$this->review = new ReviewRepository();

	$model->setTitle('Відгуки покупців');
	$model->setAlias('reviews');

	$model->onDisplay(function () {
		$display = AdminDisplay::tabbed();
		$display->SetTabs(function ()
		{
			$tabs = [];

			$columns = [
				AdminColumn::text('review_id', 'Номер відгука')->setWidth('200px'),
				AdminColumn::text('name', 'Хто залишив')->setWidth('200px'),
				AdminColumn::text('text', 'Відгук')->setWidth('200px'),
				AdminColumnEditable::checkbox('seen', 'Перевірено!', 'Новий!')->setLabel('Перевірка')->setWidth('100px'),
				AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
			];

			$checked = AdminDisplay::table();
			$checked->setColumns($columns);
			$checked->paginate(5)
				->setApply( function ($query) {
					$query->where('seen', '=', '1');
				});

			$tabs[] = AdminDisplay::tab($checked, 'Перевірені');

			$unchecked = AdminDisplay::table();
			$unchecked->setColumns($columns);
			$unchecked->paginate(5)
				->setApply( function ($query) {
					$query->where('seen', '=', '0');
				});

			$tabs[] = AdminDisplay::tab($unchecked, 'Нові')->setActive()->setBadge($this->review->getCountReview());


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