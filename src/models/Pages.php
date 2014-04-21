<?php 
namespace Pulpitum\Cms\Models;

use Pulpitum\Core\Models\Base;

class Pages extends Base{

	protected $table = 'cms_pages';
	protected $primaryKey = 'id';
	protected $modelName = 'pages';	

	public $timestamps = true;	
	public function __construct(){
		parent::__construct();
/*
		Validator::extend('owner', function($attribute, $value, $parameters){
		    return Sentry::check() && $value == Sentry::getUser()->getId();
		});
*/
	}

	public static function View($identifier){
		$lang = \Config::get('app.locale');
		$page = Pages::where("identifier", $identifier)->where("is_active", 1)->whereIn("language", array("all",$lang))->first();
		return $page;
	}
}