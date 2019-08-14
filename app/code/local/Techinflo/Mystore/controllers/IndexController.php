<?php

class Techinflo_Mystore_IndexController extends Mage_Core_Controller_Front_Action {

  public function saveprefferenceAction() { 
            /*    
        if($this->getRequest()->isPost())
		{
                 if(Mage::getSingleton('customer/session')->isLoggedIn()):
		
                 $id = $this->helper('customer')->getCustomer()->getId();
             
		 $brand = $this->getRequest()->getPost('brand');
                 $price = $this->getRequest()->getPost('price');
                 $category = $this->getRequest()->getPost('category');
                 $flag = 0;
                 $write = Mage::getSingleton('core/resource')->getConnection('core_write');
                 $read = Mage::getSingleton('core/resource')->getConnection('core_write');
                 if(!flag || $flag == 0){
	         $sql = "INSERT INTO `customer_mystore_prefference` (`customer_id`,`brand`,`price`,`category`,`flag`) VALUES ($id, $brand, $price, $category, $flag)";
                 }
                  $write->query($sql);
		  $read->query($sql);
                  endif;
                  
                }  
            
		Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Error: Your Preferences not saved'));
        $this->_redirectReferer();*/    
    } 
}
