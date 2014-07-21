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
		$labels['ContactName'] = _t('DateUpdatePage.ContactNameFieldLabel', 'Name');
		$labels['ContactEmail'] = _t('DateUpdatePage.ContactEmailFieldLabel', 'Email');
		$labels['ContactPhone'] = _t('DateUpdatePage.ContactPhoneFieldLabel', 'Phone');
		$labels['ContactMobile'] = _t('DateUpdatePage.ContactMobileFieldLabel', 'Mobile');
		return $labels;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Contact Details', new TextField('ContactName', $this->fieldLabel('ContactName')));
		$fields->addFieldToTab('Root.Contact Details', new EmailField('ContactEmail', $this->fieldLabel('ContactEmail')));
		$fields->addFieldToTab('Root.Contact Details', new TextField('ContactPhone', $this->fieldLabel('ContactPhone')));
		$fields->addFieldToTab('Root.Contact Details', new TextField('ContactMobile', $this->fieldLabel('ContactMobile')));
		return $fields;
	}
}

class MediaPage_Controller extends NewsPage_Controller {

}
