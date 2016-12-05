<?php
class Ainstainer_Blog_Model_Post extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/post');
    }

//    public function postUrl()
//    {
//        return Mage::getBaseUrl() . 'blog/post/view/id' . DS . $this->getPostId();
//    }
}