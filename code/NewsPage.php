<?php
/**
 * Represents a default news article page type
 *
 * This code is forked from https://gitlab.cwp.govt.nz/cwp/cwp (16/Jul/2014)
 *
 * @author  scienceninjas@silverstripe.com
 * @license BSD License (http://silverstripe.org/bsd-license/)
 * @package datedupdates
 */
class NewsPage extends DatedUpdatePage {

	private static $description = 'A generic news article';

	private static $default_parent = 'NewsHolderPage';

	private static $can_be_root = false;

	private static $icon = 'datedupdates/images/icons/sitetree_images/bell.png';

	public $pageIcon = 'datedupdates/images/icons/sitetree_images/bell.png';

	private static $db = array(
		'Author' => 'Varchar(255)'
	);

	private static $has_one = array(
		'FeaturedImage' => 'Image'
	);

	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['Author'] = _t('DateUpdatePage.AuthorFieldLabel', 'Author');
		$labels['FeaturedImageID'] = _t('DateUpdatePage.FeaturedImageFieldLabel', 'Featured Image');
		return $labels;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new DropdownField("ParentID", "Parent News Holder", NewsHolder::get()->map('ID', 'Title')), 'Title');
		$fields->addFieldToTab('Root.Main', new TextField('Author', $this->fieldLabel('Author')), 'Abstract');
		$fields->addFieldToTab('Root.Main', new UploadField('FeaturedImage', $this->fieldLabel('FeaturedImageID')), 'Abstract');
		return $fields;
	}
}

class NewsPage_Controller extends DatedUpdatePage_Controller {

	/**
	 * The list of functions that are public scoped url segments in this controller
	 * @var array
	 */
	private static $allowed_actions = array(
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
	}
}
