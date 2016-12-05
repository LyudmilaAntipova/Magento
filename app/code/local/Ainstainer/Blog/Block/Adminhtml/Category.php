<?php
class Ainstainer_Blog_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'blog';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = Mage::helper('blog')->__('Category requests');

        parent::__construct();
//        $this->_removeButton('add');
    }
}