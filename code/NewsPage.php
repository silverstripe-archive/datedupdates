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

	private static $enable_featured_image = false;

	private static $enable_abstract = false;

	private static $enable_author = false;

	private static $icon = 'datedupdates/images/icons/sitetree_images/bell.png';

	public $pageIcon = 'datedupdates/images/icons/sitetree_images/bell.png';

	private static $db = array(
		'Author' => 'Varchar(255)',
		'SecondaryContent' => 'HTMLText'
	);

	private static $has_one = array(
		'FeaturedImage' => 'Image'
	);

	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['SecondaryContent'] = _t('DateUpdatePage.SecondaryContentFieldLabel', 'Secondary Content');

		if(self::$enable_author) {
			$labels['Author'] = _t('DateUpdatePage.AuthorFieldLabel', 'Author');
		}

		if(self::$enable_featured_image) {
			$labels['FeaturedImageID'] = _t('DateUpdatePage.FeaturedImageFieldLabel', 'Featured Image');
		}
		return $labels;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new TextField('Author', $this->fieldLabel('Author')), 'Abstract');
		$fields->addFieldToTab('Root.Secondary Content', new HTMLEditorField('SecondaryContent', $this->fieldLabel('SecondaryContent')));

		if(self::$enable_featured_image) {
			$fields->addFieldToTab('Root.Main', new UploadField('FeaturedImage', $this->fieldLabel('FeaturedImageID')), 'Abstract');
		}
		if(!self::$enable_abstract) {
			$fields->removeByName('Abstract');
		}
		if(!self::$enable_author) {
			$fields->removeByName('Author');
		}
		return $fields;
	}
}

class NewsPage_Controller extends DatedUpdatePage_Controller {

	/**
	 * @var array $allowed_actions The list of functions that are public scoped url segments in this controller.
	 */
	private static $allowed_actions = array(
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}
