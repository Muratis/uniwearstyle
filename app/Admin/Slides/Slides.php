<?php
use App\Models\Slides;


use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Slides::class, function (ModelConfiguration $model) {

	$model->setTitle('Слайди');
	$model->setAlias('slides');
	$model->setCreateTitle('Добавить cлайд');
	$model->onDisplay(function () {
		$display = AdminDisplay::tabbed();
		$display->SetTabs(function ()
		{
			$tabs = [];

			$columns = [
				AdminColumn::text('id', 'Номер слайда'),
				AdminColumn::text('caption', 'Текст слайда')->setWidth('400px'),
				AdminColumn::image('image', 'Изображение')->setWidth('400px'),
				AdminColumn::text('university', 'Универ')->setWidth('200px'),
				AdminColumnEditable::checkbox('is_active', 'активно', 'неактивно')->setLabel('Активность')->setWidth('150px'),
			];

			$kpi = AdminDisplay::table();
			$kpi->setColumns($columns);
			$kpi->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'kpi');
				});

			$tabs[] = AdminDisplay::tab($kpi, 'КПІ')->setActive();

			$knu = AdminDisplay::table();
			$knu->setColumns($columns);
			$knu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'knu');
				});

			$tabs[] = AdminDisplay::tab($knu, 'КНУ');

			$nmu = AdminDisplay::table();
			$nmu->setColumns($columns);
			$nmu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('id', '0');
					$query->where('university', '=', 'nmu');
				});

			$tabs[] = AdminDisplay::tab($nmu, 'НМУ');

			return $tabs;
		});

		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::select('university', 'Универ')->setOptions(['kpi'=>'КПИ', 'nmu'=>'НМУ', 'knu'=>'КНУ']),
			AdminFormElement::textarea('caption', 'Текст слайда', 'tinymce'),
			AdminFormElement::image('image', 'Изображение')->required()
		);
		return $form;
	});




});