<?php
/**
 * News admin area for the CMS
 *
 * @author  scienceninjas@silverstripe.com
 * @license BSD License (http://silverstripe.org/bsd-license/)
 * @package datedupdates
 */
class NewsAdmin extends ModelAdmin {

	/**
	 * @var $menu_title
	 */
	private static $menu_title = "News";

	/**
	 * @var $url_segment
	 */
	private static $url_segment = "news";

	/**
	 * @var $menu_icon CMS sidebar menu icon for this model admin area
	 */
	private static $menu_icon = 'framework/admin/images/menu-icons/16x16/blog.png';

	/**
	 * @var $showImportForm Don't show the Import from CSV form
	 */
	public $showImportForm = false;

	/**
	 * Don't show the Import from CSV form
	 */
	private static $managed_models = array(
		'NewsHolder',
		'NewsPage',
		'EventPage',
		'MediaPage'
	);
}
