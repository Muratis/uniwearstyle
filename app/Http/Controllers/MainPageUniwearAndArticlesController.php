<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class MainPageUniwearAndArticlesController extends Controller
{

	public $article;

	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->article = new ArticleRepository($university[1]);
	}
	

	public function getIndexUniwearWithArticle()
	{
		$university = $this->getUniversityFromUrl();
		$articles = $this->article->allArticles();
		return view('/home/indexUniwear', array('articles' => $articles  ,'university' => $university));
	}

	public function getOneArticle(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$article = $this->article->oneAricle($request);
		return view('/home/mainUniwear/one', array('article' => $article, 'university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}

}
