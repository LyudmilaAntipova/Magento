<?php


class Ainstainer_Blog_CategoryController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        if (is_null($id)) {
            $this->_redirect('blog/index');
        }
        Mage::getSingleton('core/session')->setCategoryId($id, true);
        $this->loadLayout();
        $this->renderLayout();
    }
}