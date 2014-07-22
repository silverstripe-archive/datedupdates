<?php

class NewsAdmin extends ModelAdmin {

	private static $menu_title = "News";
	private static $url_segment = "news";
	private static $menu_icon = 'framework/admin/images/menu-icons/16x16/blog.png';

	/**
	 * Don't show the Import from CSV form
	 */
	public $showImportForm = false;

	private static $managed_models = array(
		'NewsHolder',
		'NewsPage',
		'EventPage',
		'MediaPage'
	);
}
