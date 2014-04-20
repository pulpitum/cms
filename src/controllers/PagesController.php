<?php
namespace Pulpitum\Cms\Controllers;

use Pulpitum\Core\Controllers\FrontendController;
use Request;

class PagesController extends FrontendController{

	private $entity;

	public function __construct(){
		parent::__construct();
		$this->entity = new \Pulpitum\Cms\Models\Pages;
	}


	public function getView(){
		$uri = Request::path();
		$page = $this->entity->where("identifier", $uri)->where("is_active", 1)->first();
		if($page == NULL)
			App::abort(404);

		$this->theme->set('keywords', $page->meta_keywords);
		$this->theme->set('description', $page->meta_description);
		$this->theme->setTitle($page->title);
		return $this->theme->of('cms::pages.view', array("data" => $page))->render();
	}

}