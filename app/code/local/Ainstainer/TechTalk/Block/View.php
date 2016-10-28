<?php
class Ainstainer_TechTalk_Block_View extends Mage_Core_Block_Template
{
    protected function _toHtml()
    {
        echo Mage::getModel('techtalk/techLogic')->sayHello();
    }

}