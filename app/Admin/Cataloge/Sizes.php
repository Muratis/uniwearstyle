<?php
use App\Models\Sizes;

use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Sizes::class, function (ModelConfiguration $model) {

	$model->setTitle('Размеры для товаров');
	$model->setAlias('sizes');
	$model->setCreateTitle('Добавить размер');
	$model->onDisplay(function () {
		$display = AdminDisplay::table()->setColumns([
			AdminColumn::text('size_id', 'Номер размера')->setWidth('200px'),
			AdminColumn::text('name', 'Название размера')->setWidth('400px'),
		]);
		$display->paginate(10);
		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('name', 'Название размера')->required()
		);
		return $form;
	});




});