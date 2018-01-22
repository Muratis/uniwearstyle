<?php
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Articles\Articles;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Articles::class, function (ModelConfiguration $model) {
	

	$model->setTitle('Новини');
	$model->setAlias('articles');
	$model->setCreateTitle('Добавити новину');
	$model->onDisplay(function () {
		$display = AdminDisplay::tabbed();
		$display->SetTabs(function ()
		{
			$tabs = [];

			$columns = [
				AdminColumn::text('article_id', 'Номер новости')->setWidth('200px'),
				AdminColumn::text('title', 'Название новости')->setWidth('400px'),
				AdminColumn::image('image', 'Картинка новости')->setWidth('400px'),
				AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
			];

			$kpi = AdminDisplay::table();
			$kpi->setColumns($columns);
			$kpi->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'kpi');
				});

			$tabs[] = AdminDisplay::tab($kpi, 'КПІ')->setActive();

			$knu = AdminDisplay::table();
			$knu->setColumns($columns);
			$knu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'knu');
				});

			$tabs[] = AdminDisplay::tab($knu, 'КНУ');

			$nmu = AdminDisplay::table();
			$nmu->setColumns($columns);
			$nmu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
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
			AdminFormElement::text('title', 'Название новости')->required(),
			AdminFormElement::image('image', 'Картинка для новости')->required(),
			AdminFormElement::textarea('text', 'Текс новости')->required()
		);
		return $form;
	});




});