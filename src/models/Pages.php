<?php 
namespace Pulpitum\Cms\Models;

use Pulpitum\Core\Models\Base;


class Pages extends Base{

	protected $table = 'cms_pages';
	protected $primaryKey = 'id';
	static $name = 'pages';	
	protected $revisionEnabled = true;
	
	/**
     * The columns to select when displaying an index.
     *
     * @var array
     */
    public static $index = array('id', 'title', 'language', 'identifier');

    protected $searchable_collumns = array("title", "content");
    protected $title_collumn = "title";

    /**
     * The columns to order by when displaying an index.
     *
     * @var string
     */
    public static $order = 'id';
    
	public $timestamps = true;	

	public function __construct(){
		parent::__construct();
	}

	public static function View($identifier){
		$lang = \Config::get('app.locale');
		$page = Pages::where("identifier", $identifier)->where("is_active", 1)->whereIn("language", array("all",$lang))->first();
		return $page;
	}

	public function getUrl(){
		return $this->identifier;
	}
}