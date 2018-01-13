<?php

namespace App\Widgets;
use App\Repositories\ReviewRepository;
use App\Repositories\CartRepository;
use SleepingOwl\Admin\Widgets\Widget;

class DashboardMap extends Widget
{

	public function __construct()
	{
		$this->order = new CartRepository();
		$this->review = new ReviewRepository();
	}


	/**
	 * Если метод вернет false, блок не будет помещен в шаблон
	 * Данный метод не обязателен
	 *
	 * @return boolean
	 */
	public function active()
	{
		return true;
	}

	/**
	 * При помещении в один блок нескольких виджетов они будут выведены в порядке их позиции
	 * Данный метод не обязателен
	 *
	 * @return integer
	 */
	public function position()
	{
		return 0;
	}

	/**
	 * HTML который необходимо поместить
	 *
	 * @return string
	 */
	public function toHtml()
	{
		$orders = $this->order->getCountOrders();
		$review = $this->review->getCountReview();
		return view('widgets.filter_university_admin.filter_university', array('review' => $review, 'orders' => $orders));
//		return 'sdfsdf';
	}

	/**
	 * Путь до шаблона, в который добавляем
	 *
	 * @return string|array
	 */



	public function template()
	{
		return \AdminTemplate::getViewPath('_partials.header');
	}

	/**
	 * Блок в шаблоне, куда помещаем
	 *
	 * @return string
	 */
	public function block()
	{
		return 'navbar';
	}
}