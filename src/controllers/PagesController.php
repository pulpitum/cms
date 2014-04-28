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
		$page = $this->entity->View($uri);

		if($page == NULL)
			App::abort(404);

		$this->theme->set('keywords', $page->meta_keywords);
		$this->theme->set('description', $page->meta_description);
		$this->theme->prependTitle($page->title." | ");
		$this->theme->layout($page->root_template);
		return $this->theme->of('cms::pages.view', array("data" => $page))->render();
	}

}