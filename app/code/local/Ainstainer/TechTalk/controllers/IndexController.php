<?php

class Ainstainer_TechTalk_IndexController  extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
//        $this->getLayout()->getBlock('contactForm')
//            ->setFormAction( Mage::getUrl('*/*/post', array('_secure' => $this->getRequest()->isSecure())) );

        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }

    public function postAction()
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

                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    $error = true;
                }

                if (Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                    $error = true;
                }

                if ($error) {
                    throw new Exception();
                }
                Mage::getModel('techtalk/contact')
                    ->setData(array('name' => $post['name'], 'email' => $post['email'], 'comment' => $post['comment']))
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