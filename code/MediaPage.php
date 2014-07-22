<?php

class MediaPage extends NewsPage {

	private static $description = 'A news article with media enquiry fields';

	private static $default_parent = 'NewsHolderPage';

	private static $can_be_root = false;

	private static $icon = 'datedupdates/images/icons/sitetree_images/megaphone.png';

	public $pageIcon = 'datedupdates/images/icons/sitetree_images/megaphone.png';

	private static $db = array(
		'ContactName' => 'Varchar(255)',
		'ContactEmail' => 'Varchar(255)',
		'ContactPhone' => 'Varchar(255)',
		'ContactMobile' => 'Varchar(255)'
	);

	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['ContactName'] = _t('DateUpdatePage.ContactNameFieldLabel', 'Contact Name');
		$labels['ContactEmail'] = _t('DateUpdatePage.ContactEmailFieldLabel', 'Contact Email');
		$labels['ContactPhone'] = _t('DateUpdatePage.ContactPhoneFieldLabel', 'Contact Phone');
		$labels['ContactMobile'] = _t('DateUpdatePage.ContactMobileFieldLabel', 'Contact Mobile');
		return $labels;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new TextField('ContactName', $this->fieldLabel('ContactName')), 'FeaturedImage');
		$fields->addFieldToTab('Root.Main', new EmailField('ContactEmail', $this->fieldLabel('ContactEmail')), 'FeaturedImage');
		$fields->addFieldToTab('Root.Main', new TextField('ContactPhone', $this->fieldLabel('ContactPhone')), 'FeaturedImage');
		$fields->addFieldToTab('Root.Main', new TextField('ContactMobile', $this->fieldLabel('ContactMobile')), 'FeaturedImage');
		return $fields;
	}
}

class MediaPage_Controller extends NewsPage_Controller {

}
