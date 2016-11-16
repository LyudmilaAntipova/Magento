<?php

class Ainstainer_TechTalk_IndexController  extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->insertContact();
        $this->renderLayout();
    }
    public function contactAction()
    {
        $this->loadLayout();
        $block = $this->getLayout()
            ->createBlock('core/text', 'example-block')
            ->setText('<h1>This is a text block</h1>');
        $this->_addContent($block);
        $this->renderLayout();
    }
    protected function _addContent(Mage_Core_Block_Abstract $block)
    {
        $this->getLayout()->getBlock('content')->append($block);
        return $this;
    }
    public function insertContact()
    {
        $post = $this->getRequest()->getPost();
        if ( $post ) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);
                $error = false;
                if (!Zend_Validate::is(trim($post['name']) , 'NotEmpty')) {
                    $error = true;
                }
                if (!Zend_Validate::is(trim($post['comment']) , 'NotEmpty')) {
                    $error = true;
                }
                if ($error) {
                    throw new Exception();
                }
                $todayDate  = Mage::getModel('core/date')->date('Y-m-d H:i:s');
                Mage::getModel('techtalk/contact')
                    ->setData(array('name' => $post['name'], 'comment' => $post['comment'], 'date_add' => $todayDate))
                    ->save();
                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('techtalk')->__('Your data has been successfully added'));
                return;
            } catch (Exception $e) {
                $translate->setTranslateInline(true);
                Mage::getSingleton('customer/session')->addError(Mage::helper('techtalk')->__('Your data were not added'));
                return;
            }
        }
    }
}