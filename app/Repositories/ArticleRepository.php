<?php

namespace App\Repositories;
use App\Models\Articles\Articles;
use App\Models\Slides;
use Illuminate\Support\Facades\DB;

class ArticleRepository
{


	public function __construct()
	{
		$this->articles = new Articles();
		$this->slide = new Slides();

	}


	public function oneArticle($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();


		$article = $this->articles
			->select('article_id', 'title', 'text', 'image')
			->where('article_id', '=', $data->article_id)->where('university', '=', $uniwearsity)->first();

		return $article;
	}


	public function allArticles()
	{
		$uniwearsity = $this->getUniversityFromUrl();
		
		$articles = $this->articles
			->select('article_id', 'title', 'image')->where('university', '=', $uniwearsity)
			->latest()->simplePaginate(6);

		return $articles ;
	}

	public function getSlides()
	{
		$uniwearsity = $this->getUniversityFromUrl();
		
		$slides = $this->slide->select('id', 'caption', 'image')
			->latest()->get();
		
		return $slides;
	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
	

}