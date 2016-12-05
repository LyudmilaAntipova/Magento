<?php


class Ainstainer_Blog_PostController  extends Mage_Core_Controller_Front_Action
{

    public function viewAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        if (is_null($id)) {
            $this->_redirect('blog/index');
        }
        Mage::getSingleton('core/session')->setPostId($id, true);
        $this->loadLayout();
        $this->renderLayout();
    }
}