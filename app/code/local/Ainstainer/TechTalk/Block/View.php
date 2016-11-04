<?php
class Ainstainer_TechTalk_Block_View extends Mage_Core_Block_Template
{
    public function getRequestRecord()
    {
        return Mage::getModel('techtalk/contact')->load(1);
    }
    public function getRequestCollection()
    {
        return Mage::getModel('techtalk/contact')->getCollection();
    }
}