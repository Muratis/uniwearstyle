<?php
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Bombers\Bomber_KNU;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Bomber_KNU::class, function (ModelConfiguration $model) {

	$model->setTitle('Бомберы KNU Style ');
	$model->setAlias('bombers_knu');
	$model->setCreateTitle('Добавить в каталог');
	$model->onDisplay(function () {
		$display = AdminDisplay::table()->setColumns([
			AdminColumn::text('bomber_id', 'Номер товара')->setWidth('200px'),
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
				$query->orderBy('bomber_id', '0');
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