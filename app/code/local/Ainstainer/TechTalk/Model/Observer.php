<?php
class Ainstainer_TechTalk_Model_Observer {
    
	/* @param $event Varien_Event_Observer */
	
    public function addStatus($event){
        $statuses = $event->getData('statuses')->getData();
        $statuses[] = 'Force Enabled';
        $event->getData('statuses')->setData($statuses);
    }

    /* @param $fact Varien_Event_Observer */
    public function controller_action_postdispatch_contacts($fact){

        $even = Mage::app()->getRequest()->getParams();

        $mod = Mage::getModel('techtalk/contact');
        $mod->newAuthor($even['name']);
        $mod->newComment($even['comment']);
        $mod->newPhone($even['phone']);
        $mod->newEmail($even['email']);
        $mod->save();

    }
}