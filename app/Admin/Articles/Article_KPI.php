<?php
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Articles\Article_KPI;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Article_KPI::class, function (ModelConfiguration $model) {

	$model->setTitle('Новости KPI Style ');
	$model->setAlias('articles_kpi');
	$model->setCreateTitle('Добавить новость');
	$model->onDisplay(function () {
		$display = AdminDisplay::table()->setColumns([
			AdminColumn::text('article_id', 'Номер новости')->setWidth('200px'),
			AdminColumn::text('title', 'Название новости')->setWidth('400px'),
			AdminColumn::image('image', 'Картинка новости')->setWidth('400px'),
//			AdminColumn::text('text', 'Текст новости')->setWidth('400px'),
			AdminColumn::datetime('created_at')->setLabel('Дата')->setFormat('d.m.Y')->setWidth('150px')
		]);
		$display->paginate(4)
			->setApply( function ($query) {
				$query->orderBy('article_id', '0');
			});
		return $display;
	});


	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('title', 'Название новости')->required(),
			AdminFormElement::image('image', 'Картинка для новости')->required(),
			AdminFormElement::textarea('text', 'Текс новости')->required()
		);
		return $form;
	});




});