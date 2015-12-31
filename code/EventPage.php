<?php
/**
 * An news article page type that adds event date and location fields,
 * intended to represent an article that describes a physical event or meeting.
 *
 * @author  scienceninjas@silverstripe.com
 * @license BSD License (http://silverstripe.org/bsd-license/)
 * @package datedupdates
 */
class EventPage extends NewsPage
{

    private static $description = 'A news article with event fields';

    private static $default_parent = 'NewsHolderPage';

    private static $can_be_root = false;

    private static $icon = 'datedupdates/images/icons/sitetree_images/flag.png';

    public $pageIcon = 'datedupdates/images/icons/sitetree_images/flag.png';

    private static $db = array(
        'EventDate' => 'Varchar(255)',
        'EventLocation' => 'Varchar(255)'
    );

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels['EventDate'] = _t('DateUpdatePage.EventDateFieldLabel', 'Event Date');
        $labels['EventLocation'] = _t('DateUpdatePage.EventLocationFieldLabel', 'Event Location');
        return $labels;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new TextField('EventDate', $this->fieldLabel('EventDate')), 'Content');
        $fields->addFieldToTab('Root.Main', new TextField('EventLocation', $this->fieldLabel('EventLocation')), 'Content');
        return $fields;
    }
}

class EventPage_Controller extends NewsPage_Controller
{

    /**
     * @var array $allowed_actions The list of functions that are public scoped url segments in this controller.
     */
    private static $allowed_actions = array(
    );

    /**
     * Initialise the controller
     */
    public function init()
    {
        parent::init();
    }
}
