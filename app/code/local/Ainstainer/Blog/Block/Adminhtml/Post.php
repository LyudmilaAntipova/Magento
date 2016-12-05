<?php
class Ainstainer_Blog_Block_Adminhtml_Post extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_post';
        $this->_headerText = Mage::helper('blog')->__('Post requests');

        parent::__construct();
//        $this->_removeButton('add');
    }
}