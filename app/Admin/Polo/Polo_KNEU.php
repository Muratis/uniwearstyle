<?php
use App\Models\Sizes;
use App\Models\Polo\Polo_KNEU;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Polo_KNEU::class, function (ModelConfiguration $model) {

	$model->setTitle('Поло KNEU Style ');
	$model->setAlias('polo_kneu');
	$model->setCreateTitle('Добавить в каталог');
	$model->onDisplay(function () {
		$display = AdminDisplay::table()->setColumns([
			AdminColumn::text('polo_id', 'Номер товара')->setWidth('200px'),
			AdminColumn::text('name', 'название товара')->setWidth('400px'),
			AdminColumn::text('description', 'Описание товара')->setWidth('400px'),
			AdminColumn::image('image', 'Изображение товара')->setWidth('400px'),
			AdminColumn::text('price', 'Цена грн')->setWidth('400px'),
			AdminColumn::lists('cataloge.name', 'Размеры')->setWidth('400px'),

//			AdminColumn::text('gender', 'Пол')->setWidth('400px'),

			AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
		]);
		$display->paginate(4)
			->setApply( function ($query) {
				$query->orderBy('polo_id', '0');
			});
		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('name', 'Название товара')->required(),
			AdminFormElement::number('price', 'Цена грн')->required(),
			AdminFormElement::text('description', 'Описание товара'),

			AdminFormElement::multiselect('cataloge', 'Выберите размер')->setModelForOptions(new Sizes())->setDisplay('name'),


//			AdminFormElement::radio('gender', 'Пол', $options = [ 'male', 'female']),
			AdminFormElement::images('image', 'изображение товара')->storeAsComaSeparatedValue()->required()
		);
		return $form;
	});


});