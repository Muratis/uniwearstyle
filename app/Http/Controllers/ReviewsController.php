<?php

namespace App\Http\Controllers;

use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
	public $review;

	public function __construct()
	{
		$this->review = new ReviewRepository();
	}

	public function getAllReviews() 
	{
		$reviews = $this->review->getReviews();
		return view('/reviews/all', array('reviews' => $reviews));
	}
	
	public function postAddReview(Request $request) 
	{
		if ($request->name == '' || $request->text == '') {
			return false;
		}

		$this->review->addReview($request);
	}


}