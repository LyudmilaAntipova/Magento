<?php
class Ainstainer_TechTalk_Model_Block extends Mage_Cms_Model_Block{

    protected function _beforeSave()
    {
        if (!preg_match('/Made in USA/', $this->getContent())) {

            $this->setContent('<p>Made in USA</p>' . $this->getContent());
        }

        $needle = 'block_id="' . $this->getBlockId() . '"';
        if (false == strstr($this->getContent(), $needle)) {

            return Mage_Core_Model_Abstract::_beforeSave();
        }
        Mage::throwException(Mage::helper('cms')->__('The static block content cannot contain  directive with its self.')
        );
    }

}