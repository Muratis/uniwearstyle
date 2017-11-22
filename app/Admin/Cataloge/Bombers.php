<?php
use App\Models\Sizes;
use App\Models\Cataloge\Bombers;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Bombers::class, function (ModelConfiguration $model) {

	$model->setTitle('Бомберы');
	$model->setAlias('bombers');
	$model->setCreateTitle('Добавить в каталог');
	$model->onDisplay(function () {
		$display = AdminDisplay::table();
		$display->setFilters(
			AdminDisplayFilter::field('university')
		)->setColumns([
			AdminColumn::text('id', 'Номер товара')->setWidth('200px'),
			AdminColumn::text('name', 'название товара')->setWidth('400px'),
			AdminColumn::text('description', 'Описание товара')->setWidth('400px'),
			AdminColumn::image('image', 'Изображение товара')->setWidth('400px'),
			AdminColumn::text('price', 'Цена грн')->setWidth('400px'),
			AdminColumn::text('university', 'Универ')->setWidth('400px'),
			AdminColumn::lists('cataloge.name', 'Размеры')->setWidth('400px'),
			AdminColumnEditable::checkbox('stock', 'есть', 'нету')->setLabel('Наличие')->setWidth('100px'),


			AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
		]);
		$display->paginate(4)
			->setApply( function ($query) {
				$query->orderBy('id', '0');
			});
		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::select('university', 'Универ')->setOptions(['kpi'=>'КПИ', 'nmu'=>'НМУ']),
			AdminFormElement::text('name', 'Название товара')->required(),
			AdminFormElement::number('price', 'Цена грн')->required(),
			AdminFormElement::textarea('description', 'Описание товара'),
			AdminFormElement::multiselect('cataloge', 'Выберите размер')->setModelForOptions(new Sizes())->setDisplay('name'),

//			AdminFormElement::radio('gender', 'Пол', $options = [ 'male', 'female']),
			AdminFormElement::images('image', 'изображение товара')->storeAsComaSeparatedValue()->required()
		);
		return $form;
	});




});