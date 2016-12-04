<?php

require_once(Mage::getModuleDir('controllers', 'Mage_Customer').DS.'AccountController.php');

class Ainstainer_TechTalk_AccountController extends Mage_Customer_AccountController {

    /*Customer register form page*/

    public function createAction()
    {
       return $this->_redirect('noroute');
    }

}
