<?php
class Ainstainer_TechTalk_Model_Contact extends Mage_Core_Model_Abstract{

    protected function _construct()
    {
        $this->_init('techtalk/contact');
    }

    public function getName()
    {
        return 'Ms.' . $this->getData('name');
    }
}