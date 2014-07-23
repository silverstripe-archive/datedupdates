<?php
/**
 * An abstract base class for {@link NewsPage} pages.
 *
 * This code is forked from https://gitlab.cwp.govt.nz/cwp/cwp (16/Jul/2014)
 *
 * @author  scienceninjas@silverstripe.com
 * @license BSD License (http://silverstripe.org/bsd-license/)
 * @package datedupdates
 */
class DatedUpdatePage extends Page {

	/**
	 * @var string $hide_ancestor This is meant as an abstract base class, so we want to hide the ancestor from the cms.
	 */
	private static $hide_ancestor = 'DatedUpdatePage';

	/**
	 * @var array $defaults Default values used to initialise properties of this class. ShowInMenus is false to hide this class from cms generated menus.
	 */
	private static $defaults = array(
		'ShowInMenus' => false
	);

	/**
	 * @var array $db Database field definitions.
	 */
	private static $db = array(
		'Abstract' => 'Text',
		'Date' => 'Datetime'
	);

	/**
	 * @var array $summary_fields Used to configure the fields displayed in gridfields like we do in {@link NewsAdmin}
	 */
	private static $summary_fields = array(
		'ID' => 'ID',
		'MenuTitle' => 'Page name',
		'Created' => 'Created',
		'LastEdited' => 'Last Edited'
	);

	/**
	 * @return array A getter method for the $summary_fields array.
	 */
	public function summaryFields(){
		return self::$summary_fields;
	}

	/**
	 * Add the default for the Date being the current day.
	 */
	public function populateDefaults() {
		parent::populateDefaults();

		if(!isset($this->Date) || $this->Date === null) {
			$this->Date = SS_Datetime::now()->Format('Y-m-d 09:00:00');
		}
	}

	/**
	 * @param boolean $includerelations A boolean value to indicate if the labels returned include relation fields
	 * @return array|string
	 */
	public function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['Date'] = _t('DateUpdatePage.DateLabel', 'Date');
		$labels['Abstract'] = _t('DateUpdatePage.AbstractTextFieldLabel', 'Abstract');
		return $labels;
	}

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab(
			'Root.Main',
			$dateTimeField = new DatetimeField('Date', $this->fieldLabel('Date')),
			'Content'
		);
		$dateTimeField->getDateField()->setConfig('showcalendar', true);

		$fields->addfieldToTab(
			'Root.Main',
			$abstractField = new TextareaField('Abstract', $this->fieldLabel('Abstract')),
			'Content'
		);
		$abstractField->setAttribute('maxlength', '160');
		$abstractField->setRightTitle(
			_t('DateUpdatePage.AbstractDesc','The abstract is used as a summary on the listing pages. It is limited to 160 characters.')
		);
		$abstractField->setRows(6);

		return $fields;
	}
}

class DatedUpdatePage_Controller extends Page_Controller {

	/**
	 * @var array $allowed_actions The list of functions that are public scoped url segments in this controller
	 */
	private static $allowed_actions = array(
	);

	/**
	 * Initialises the controller
	 */
	public function init() {
	}
}
