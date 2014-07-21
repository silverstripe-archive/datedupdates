<?php

class EventPage extends NewsPage {

	private static $description = 'Describes an Event item';

	private static $default_parent = 'NewsHolderPage';

	private static $can_be_root = false;

	private static $icon = 'datedupdates/images/icons/sitetree_images/date.png';

	public $pageIcon = 'datedupdates/images/icons/sitetree_images/date.png';

	private static $db = array(
		'Location' => 'Varchar(255)'
	);

	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['Location'] = _t('DateUpdatePage.LocationFieldLabel', 'Location');
		return $labels;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new TextField('Location', $this->fieldLabel('Location')), 'Author');
		return $fields;
	}
}

class EventPage_Controller extends NewsPage_Controller {

}
