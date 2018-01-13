<?php
namespace App\Repositories;
use App\Models\Reviews;


class ReviewRepository 
{

	public function __construct()
	{
		$this->review = new Reviews();
	}
	
	public function addReview($data)
	{
		$this->review->name = $data->name;
		$this->review->text = $data->text;
		$this->review->save();
	}

	public function getReviews()
	{
		$reviews = $this->review->select('name', 'text', 'created_at')->where('seen', '=', '1')->latest()->paginate(5);
		
		return $reviews;
	}

	public function getCountReview()
	{
		$reviews = $this->review->select('review_id')->where('seen', '=', '0')->count();
		return $reviews;
	}

	public function notificationReview()
	{

	}
	
}