<?php
class Ainstainer_TechTalk_Model_Resource_Contact extends Mage_Core_Model_Resource_Db_Abstract {


    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('techtalk/contact', 'request_id');
    }

}