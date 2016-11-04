<?php

class Ainstainer_TechTalk_Model_Resource_Contact_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    /*
     * define resource model*/

    protected function _construct()
    {
        $this->_init('techtalk/contact');
    }
}