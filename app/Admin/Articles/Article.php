<?php
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Articles\Articles;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Articles::class, function (ModelConfiguration $model) {

	$model->setTitle('Новости');
	$model->setAlias('articles');
	$model->setCreateTitle('Добавить новость');
	$model->onDisplay(function () {
		$display = AdminDisplay::datatables();
		$display->setFilters(
			AdminDisplayFilter::field('university')
		)->setColumns([
			AdminColumn::text('article_id', 'Номер новости')->setWidth('200px'),
			AdminColumn::text('title', 'Название новости')->setWidth('400px'),
			AdminColumn::image('image', 'Картинка новости')->setWidth('400px'),
			AdminColumn::text('university', 'Универ')->setWidth('400px'),
			AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
		]);
		$display->paginate(8);
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