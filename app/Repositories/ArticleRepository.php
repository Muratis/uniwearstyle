<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class ArticleRepository
{
	private $model;
	private $models = [
		'kpi' => 'Article_KPI',
		'nmu' => 'Article_NMU',
		'kneu' => 'Article_KNEU',
		'knu' => 'Article_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}


	public function oneAricle($data)
	{
		$article = $this->model
			->select('article_id', 'title', 'text', 'image')
			->where('article_id', '=', $data->article_id)->first();

		return $article;
	}


	public function allArticles()
	{
		$articles = $this->model
			->select('article_id', 'title', 'image')
			->latest()->simplePaginate(6);

		return $articles ;
	}

	private function getTshirtModelByUniversity($university)
	{
		if (!array_key_exists($university, $this->models)) {
			abort(404);
		}

		$tshirt_model = 'App\\Models\\Articles\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
}