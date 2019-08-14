<?php
class Techinflo_MystoreOption_IndexController extends Mage_Core_Controller_Front_Action
{
   public function indexAction()
   {
		$this->loadLayout();
		$this->renderLayout();
   }
   
   public function guestprefferenceAction() { 
        
       if($this->getRequest()->isPost())
		{      
				$random = mt_rand(1, 999);
				$variable = 'Guest';
				$cookie_name = $variable . '' . $random ;
				
				$user = "User";
				$value = $cookie_name;
				$expireinhrs = Mage::getStoreConfig('techinflo/mystoreoption/cookietime');
				$expireinsec = $expireinhrs * 60 * 60;
				$expire = time() +$expireinsec;
				setcookie($user, $value, $expire, '/');
		
		         if(!$this->getRequest()->getPost('brand')) $brand = 'off'; 
				 else $brand = $this->getRequest()->getPost('brand');
				 
				 if(!$this->getRequest()->getPost('price')) $price = 'off';
                 else $price = $this->getRequest()->getPost('price');
				 
				 if(!$this->getRequest()->getPost('category')) $category = 'off';
		         else $category = $this->getRequest()->getPost('category');

                 $flag = $this->getRequest()->getPost('flag');
				 
				 $brands = $this->getRequest()->getPost('brands');
				 $prices = $this->getRequest()->getPost('prices');
				 $categories = $this->getRequest()->getPost('categories');
				 
				 $brandstr = implode(',', $brands );
				 $pricestr = implode(',', $prices );
				 $categorystr = implode(',', $categories );
				 
                $connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');
				 
				$table = $connectionWrite->getTableName('guest_mystore_prefference');
				
					$connectionWrite->beginTransaction();
					$data = array();
					$data['cookie_name']= $value;
					$data['brand']= $brand;
					$data['price']= $price;
					$data['category']= $category;
					$data['brands']= $brandstr;
					$data['prices']= $pricestr;
					$data['categories']= $categorystr;
					$connectionWrite->insert($table, $data);
					$connectionWrite->commit();

				 if($connectionWrite->commit())
				 Mage::getSingleton('customer/session')->addSuccess(Mage::helper('mystore')->__('The Preferences are saved successfully'));               
             } 
			 else  {  
				 Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Error: Your Preferences are not saved')); 
              }
              $this->_redirectReferer();  
        }
		
	public function registersaveprefferenceAction() { 
        
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
		
        $email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
          
        if($this->getRequest()->isPost())
		{        

	    $brand = $this->getRequest()->getPost('brand');
		$brands = $this->getRequest()->getPost('brands');
		$price = $this->getRequest()->getPost('price');
		$prices = $this->getRequest()->getPost('pricessss');
		$category = $this->getRequest()->getPost('category');
		$categories = $this->getRequest()->getPost('categories');
		
		$resource = Mage::getSingleton('core/resource');
	    $connection = $resource->getConnection('core_write');
		$table = $resource->getTableName('customer_mystore_prefference');
		
        $sql = "UPDATE `customer_mystore_prefference` SET brand ='$brand',category ='$category',price ='$price',brands = '$brands',categories ='$categories',prices = '$prices' WHERE customer_email = '$email '";

		$connection->query($sql);      
        }    	 
	}			
               //Mage::getSingleton('customer/session')->addSuccess(Mage::helper('mystore')->__('The Preferences are saved successfully'));
                 //$this->_redirectReferer();
				
				
        
        else  {  Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Error: Your Preferences are not saved')); 
				 $this->_redirectReferer(); 
              }
			  
   }
  
}
?>