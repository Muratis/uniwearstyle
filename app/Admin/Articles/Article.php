<?php
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Articles\Articles;
use App\Models\Dispatch;
use Illuminate\Support\Facades\Mail;
use SleepingOwl\Admin\Model\ModelConfiguration;
use Illuminate\Support\Facades\Input;
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

			$kneu = AdminDisplay::table();
			$kneu->setColumns($columns);
			$kneu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'kneu');
				});

			$tabs[] = AdminDisplay::tab($kneu, 'КНЕУ');

			$knteu = AdminDisplay::table();
			$knteu->setColumns($columns);
			$knteu->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'knteu');
				});

			$tabs[] = AdminDisplay::tab($knteu, 'КНТЕУ');

			$knukim = AdminDisplay::table();
			$knukim->setColumns($columns);
			$knukim->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'knukim');
				});

			$tabs[] = AdminDisplay::tab($knukim, 'КНУКІМ');

			$nau = AdminDisplay::table();
			$nau->setColumns($columns);
			$nau->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'nau');
				});

			$tabs[] = AdminDisplay::tab($nau, 'НАУ');

			$nmau = AdminDisplay::table();
			$nmau->setColumns($columns);
			$nmau->paginate(5)
				->setApply( function ($query) {
					$query->orderBy('article_id', '0');
					$query->where('university', '=', 'nmau');
				});

			$tabs[] = AdminDisplay::tab($nmau, 'НМАУ');

			return $tabs;
		});

		return $display;
	});

	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::select('university', 'Универ')->setOptions(['kpi'=>'КПІ', 'nmu'=>'НМУ', 'knu'=>'КНУ', 'kneu'=>'КНЕУ',
				'knteu'=>'КНТЕУ', 'knukim'=>'КНУКІМ', 'nau'=>'НАУ', 'nmau'=>'НМАУ']),
			AdminFormElement::text('title', 'Название новости')->required(),
			AdminFormElement::image('image', 'Картинка для новости')->required(),
			AdminFormElement::textarea('text', 'Текс новости')->required()
		);
		return $form;
	});

	 $model->created(function () {
		 $this->email = new Dispatch();
		 $uniwear_name = Input::get('university');
		 $title_article = Input::get('title');
		 $image_atticle = Input::get('image');

		 $emails = $this->email->select('email')->where('university', '=', $uniwear_name )->get();

		 $dispatch_emails = [];
		 foreach ($emails as $dispatch_email) {
			 $dispatch_emails[] = $dispatch_email->email;
		 }

		 Mail::send('mail.dispatch_article', ['title' => $title_article, 'image' => $image_atticle, 'university' => $uniwear_name], function ($m) use ($dispatch_emails, $uniwear_name){
			 $m->from('UniwearStyle@gmail.com', 'UniwearStyle');
			 $m->to($dispatch_emails)->subject('Нова новина на Uniwear ' .  strtoupper($uniwear_name) . ' Style');
		 });


	 });

});