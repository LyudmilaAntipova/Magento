<?php
class Ainstainer_TechTalk_Model_TechLogic extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('techtalk/techLogic');
    }

    public function sayHello(){
        echo 'Hello World';
    }
}