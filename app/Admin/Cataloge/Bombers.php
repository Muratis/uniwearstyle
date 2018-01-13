<?php
use App\Models\Sizes;
use App\Models\Cataloge_admin\Bombers;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Bombers::class, function (ModelConfiguration $model) {

	$model->setTitle('Бомберы');
	$model->setAlias('bombers');
	$model->setCreateTitle('Добавить в каталог');
	$model->onDisplay(function () {
		$display = AdminDisplay::tabbed();
		$display->SetTabs(function ()
		{
			$tabs = [];

			$columns = [
				AdminColumn::text('id', 'Номер товара')->setWidth('200px'),
				AdminColumn::text('name', 'название товара')->setWidth('400px'),
				AdminColumn::text('description', 'Описание товара')->setWidth('400px'),
				AdminColumn::image('image', 'Изображение товара')->setWidth('400px'),
				AdminColumn::text('price', 'Цена грн')->setWidth('200px'),
				AdminColumn::text('gender', 'Пол'),
				AdminColumn::lists('cataloge_sizes.name', 'Размеры')->setWidth('100px'),
				AdminColumnEditable::checkbox('stock', 'есть', 'нету')->setLabel('Наличие')->setWidth('100px'),

				AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
			];

			$kpi = AdminDisplay::table();
			$kpi->setColumns($columns);
			$kpi->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'kpi');
					$query->where('clothes_type', '=', 'bomber');
				});

			$tabs[] = AdminDisplay::tab($kpi, 'КПІ')->setActive();

			$knu = AdminDisplay::table();
			$knu->setColumns($columns);
			$knu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'knu');
					$query->where('clothes_type', '=', 'bomber');
				});

			$tabs[] = AdminDisplay::tab($knu, 'КНУ');

			$nmu = AdminDisplay::table();
			$nmu->setColumns($columns);
			$nmu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'nmu');
					$query->where('clothes_type', '=', 'bomber');
				});

			$tabs[] = AdminDisplay::tab($nmu, 'НМУ');

			return $tabs;
		});

		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::select('university', 'Универ')->setOptions(['kpi'=>'КПИ', 'nmu'=>'НМУ', 'knu'=> 'КНУ']),
			AdminFormElement::text('name', 'Название товара')->required(),
			AdminFormElement::hidden('clothes_type')->setDefaultValue('bomber'),
			AdminFormElement::number('price', 'Цена грн')->required(),
			AdminFormElement::textarea('description', 'Описание товара'),
			AdminFormElement::multiselect('cataloge_sizes', 'Выберите размер')->setModelForOptions(new Sizes())->setDisplay('name')->required(),

			AdminFormElement::radio('gender', 'Пол')->setOptions(['male'=>'Чоловічий', 'female'=>'Жіночий', 'unisex'=>'Унісекс'])->required(),
			AdminFormElement::images('image', 'изображение товара')->storeAsComaSeparatedValue()->required()
		);
		return $form;
	});




});