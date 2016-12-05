<?php
class Ainstainer_Blog_Block_View extends Mage_Core_Block_Template
{
    public function getRequestRecord()
    {
        return Mage::getModel('blog/post')->load(1);
    }
    public function getPost()
    {
        return Mage::getModel('blog/post')->getCollection();
    }
    public function getCategory()
    {
        return Mage::getModel('blog/category')->getCollection();
    }
}