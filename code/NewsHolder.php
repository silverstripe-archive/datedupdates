<?php
/**
 * Container page for News, Events and Media articles, provides filtering, pagination and rss
 *
 * This code is forked from https://gitlab.cwp.govt.nz/cwp/cwp (16/Jul/2014)
 *
 * @author  scienceninjas@silverstripe.com
 * @license BSD License (http://silverstripe.org/bsd-license/)
 * @package datedupdates
 */
class NewsHolder extends DatedUpdateHolder {

	private static $description = 'Container page for News, Events and Media articles, provides filtering and pagination';

	private static $allowed_children = array('NewsPage', 'EventPage', 'MediaPage');

	private static $default_child = 'NewsPage';

	private static $update_name = 'News';

	private static $update_class = 'NewsPage';

	private static $db = array(
		'FooterHeading' => 'Varchar(255)',
		'FooterContent' => 'HTMLText'
	);

	/**
	 * @var string $icon Icon to use in the CMS page tree. This should be the full filename, relative to the webroot.
	 */
	private static $icon = 'datedupdates/images/icons/sitetree_images/news_listing.png';

	/**
	 * Find all site's news items, based on some filters.
	 * Omitting parameters will prevent relevant filters from being applied. The filters are ANDed together.
	 *
	 * @param $className The name of the class to fetch.
	 * @param $parentID The ID of the holder to extract the news items from.
	 * @param $tagID The ID of the tag to filter the news items by.
	 * @param $dateFrom The beginning of a date filter range.
	 * @param $dateTo The end of the date filter range. If empty, only one day will be searched for.
	 * @param $year Numeric value of the year to show.
	 * @param $monthNumber Numeric value of the month to show.
	 *
	 * @return DataList | PaginatedList
	 */
	public static function AllUpdates($className = 'NewsPage', $parentID = null, $tagID = null, $dateFrom = null,
			$dateTo = null, $year = null, $monthNumber = null) {

		return parent::AllUpdates($className, $parentID, $tagID, $dateFrom, $dateTo, $year, $monthNumber)->Sort('Date', 'DESC');
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Footer Content', new TextField('FooterHeading', 'Footer Heading'));
		$fields->addFieldToTab('Root.Footer Content', new HTMLEditorField('FooterContent', 'Footer Content'));
		return $fields;
	}

	public function getFooterHeadingAnchor(){
		if($this->FooterHeading) {
			return Convert::raw2url($this->FooterHeading);
		}
	}
}

class NewsHolder_Controller extends DatedUpdateHolder_Controller {

	private static $allowed_actions = array(
		'rss',
//		'datedupdate'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	public function rss() {
		$rss = new RSSFeed($this->Updates()->sort('Created DESC')->limit(20), $this->Link(), $this->getSubscriptionTitle());
		$rss->setTemplate('NewsHolder_rss');
		return $rss->outputToBrowser();
	}

	/* *
	 * Responds to ajax calls to return a json object containing DatedUpdatePage content that is
	 * rendered in its panel tempalte.
	 *
	 * This method is called by: themes/meridian/js/src/news-panel.src.js
	 *
	 * @param  SS_Request Silverstripe Request object passed in as a paramter
	 * @return string 	JSON w/ Content of requested DatedUpdatePage
	 *                  Empty JSON object if DatedUpdatePage is not found

	public function datedupdate(SS_HTTPRequest $request) {
		$newsID = $request->param('ID');
		$this->response->addHeader("Content-Type", "application/json");
		if(Director::is_ajax()) {
			// Load the news article
			$datedUpdatePage = DatedUpdatePage::get()
					->filter(array('ID' => Convert::raw2sql($newsID)))
					->First();
			if($datedUpdatePage && $datedUpdatePage->ID && $datedUpdatePage->isPublished()) {
				// Build an array of template data to pass into the renderWith function, these field names must
				// match the variables referenced in the template itself
				$templateData = array(
						'Title'				=> $datedUpdatePage->Title,
						'Author' 			=> $datedUpdatePage->Author,
						'Date' 				=> $datedUpdatePage->Date,
						'Content' 			=> $datedUpdatePage->Content,
						'ClassName'			=> $datedUpdatePage->ClassName
					);

				// Check SecondaryContent is valid before adding it
				if(isset($datedUpdatePage->SecondaryContent) && $datedUpdatePage->SecondaryContent !== null) {
					$templateData['SecondaryContent'] = $datedUpdatePage->SecondaryContent;
				}
				// Add extra fields for EventPage and MediaPage types
				if($datedUpdatePage->ClassName == 'EventPage') {
					$templateData['EventDate'] 		= $datedUpdatePage->EventDate;
					$templateData['EventLocation'] 	= $datedUpdatePage->EventLocation;
				}
				// @todo maybe use Email::obfuscate on $datedUpdatePage->ContactEmail
				elseif($datedUpdatePage->ClassName == 'MediaPage') {
					$templateData['ContactName'] 	= $datedUpdatePage->ContactName;
					$templateData['ContactEmail'] 	= $datedUpdatePage->ContactEmail;
					$templateData['ContactPhone'] 	= $datedUpdatePage->ContactPhone;
					$templateData['ContactMobile'] 	= $datedUpdatePage->ContactMobile;
				}

				// Get the content by rendering it in a template
				$content = $this->renderWith('Panels/DatedUpdatePanel_Content', $templateData);
				// strip the BR tags and html_entity_decode the string makes it display as expected
				$content = html_entity_decode(str_ireplace('<br />', '', $content));

				// parse shortcodes in content
				$content = ShortcodeParser::get_active()->parse($content);

				// return the content wrapped in a json array
				return json_encode(array('html' => $content));
			}
		}
		return '{}';
	}
		 */
}
