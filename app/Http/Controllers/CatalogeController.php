<?php
namespace App\Http\Controllers;

use App\Repositories\CatalogeRepository;
use Illuminate\Http\Request;


class CatalogeController extends Controller
{

	protected $cataloge;

	public function __construct()
	{
		$this->cataloge = new CatalogeRepository();
	}

	public function OneItemCataloge(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->cataloge->oneItemCataloge($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}
	
	public function getAllCataloge(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}
		$allSize = $this->cataloge->getSizeFilter();
		$content = $this->cataloge->allCatalog($size);

		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university, 'size' => $allSize));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university, 'size' => $allSize));
		}
	}

	public function getAllTshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$allSize = $this->cataloge->getSizeFilter();

		$content = $this->cataloge->allTshirts($size);

		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university, 'size' => $allSize));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university, 'size' => $allSize));
		}
	}

	public function getAllPolo(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$allSize = $this->cataloge->getSizeFilter();

		$content = $this->cataloge->allPolos($size);

		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university, 'size' => $allSize));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university, 'size' => $allSize));
		}
	}

	public function getAllSweatshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$allSize = $this->cataloge->getSizeFilter();

		$content = $this->cataloge->allSweatshirts($size);

		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university, 'size' => $allSize));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university, 'size' => $allSize));
		}
	}

	public function getAllBombers(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$allSize = $this->cataloge->getSizeFilter();

		$content = $this->cataloge->allBombers($size);

		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university, 'size' => $allSize));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university, 'size' => $allSize));
		}
	}




	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}


}