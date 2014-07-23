<?php

class EventPage extends NewsPage {

	private static $description = 'A news article with event fields';

	private static $default_parent = 'NewsHolderPage';

	private static $can_be_root = false;

	private static $icon = 'datedupdates/images/icons/sitetree_images/flag.png';

	public $pageIcon = 'datedupdates/images/icons/sitetree_images/flag.png';

	private static $db = array(
		'EventDate' => 'Datetime',
		'EventLocation' => 'Varchar(255)'
	);

	/**
	 * 
	 * @param boolean $includerelations
	 * @return array
	 */
	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['EventLocation'] = _t('DateUpdatePage.EventDateFieldLabel', 'Event Date');
		$labels['EventLocation'] = _t('DateUpdatePage.EventLocationFieldLabel', 'Event Location');
		return $labels;
	}

	/**
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new DatetimeField('EventDate', $this->fieldLabel('EventDate')), 'FeaturedImage');
		$fields->addFieldToTab('Root.Main', new TextField('Location', $this->fieldLabel('EventLocation')), 'FeaturedImage');
		return $fields;
	}
}

class EventPage_Controller extends NewsPage_Controller {

}
