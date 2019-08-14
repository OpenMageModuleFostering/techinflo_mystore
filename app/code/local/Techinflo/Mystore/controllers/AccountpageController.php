<?php class Techinflo_Mystore_AccountpageController extends Mage_Core_Controller_Front_Action {    protected function _getSession() {        return Mage::getSingleton('customer/session');    }    public function preDispatch() {        parent::preDispatch();            if (!Mage::getSingleton('customer/session')->authenticate($this)) {                $this->setFlag('', 'no-dispatch', true);        }    }    public function indexAction() { // landing page        $this->loadLayout();        $this->renderLayout();    }        public function saveprefferenceAction() {                 if(Mage::getSingleton('customer/session')->isLoggedIn()) { 					$email = Mage::getSingleton('customer/session')->getCustomer()->getemail();                      if($this->getRequest()->isPost()) {        		         if(!$this->getRequest()->getPost('brand')) $brand = 'off'; 				 else $brand = $this->getRequest()->getPost('brand');				 				 if(!$this->getRequest()->getPost('price')) $price = 'off';                 else $price = $this->getRequest()->getPost('price');				 				 if(!$this->getRequest()->getPost('category')) $category = 'off';		         else $category = $this->getRequest()->getPost('category');                 $flag = $this->getRequest()->getPost('flag');				 				 $brands = $this->getRequest()->getPost('brands');				 $prices = $this->getRequest()->getPost('prices');				 $categories = $this->getRequest()->getPost('categories');				 				 $brandstr = implode(',', $brands );				 $pricestr = implode(',', $prices );				 $categorystr = implode(',', $categories );				                 $connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');								$sql_query = "DELETE FROM `customer_mystore_prefference` WHERE customer_email = '$email '";								$connectionWrite->query($sql_query);				 				$table = $connectionWrite->getTableName('customer_mystore_prefference');									$connectionWrite->beginTransaction();					$data = array();					$data['customer_email']= $email;					$data['brand']= $brand;					$data['price']= $price;					$data['category']= $category;					$data['brands']= $brandstr;					$data['prices']= $pricestr;					$data['categories']= $categorystr;					$connectionWrite->insert($table, $data);					$connectionWrite->commit();				 if($connectionWrite->commit())				 Mage::getSingleton('customer/session')->addSuccess(Mage::helper('mystore')->__('The Preferences are saved successfully'));                            } 			 else  {  				 Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Error: Your Preferences are not saved'));               }              $this->_redirectReferer();          }		else {  				 Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Your session expired, Please login and try again')); 				 $this->_redirectReferer();              }    }             public function guestprefferenceAction() {                if($this->getRequest()->isPost())		{      				$random = mt_rand(1, 999);				$variable = 'Guest';				$cookie_name = $variable . '' . $random ;								$user = "User";				$value = $cookie_name;				$expireinhrs = Mage::getStoreConfig('techinflo/mystoreoption/cookietime');				$expireinsec = $expireinhrs * 60 * 60;				$expire = time() +$expireinsec;				setcookie($user, $value, $expire, '/');				         if(!$this->getRequest()->getPost('brand')) $brand = 'off'; 				 else $brand = $this->getRequest()->getPost('brand');				 				 if(!$this->getRequest()->getPost('price')) $price = 'off';                 else $price = $this->getRequest()->getPost('price');				 				 if(!$this->getRequest()->getPost('category')) $category = 'off';		         else $category = $this->getRequest()->getPost('category');                 $flag = $this->getRequest()->getPost('flag');				 				 $brands = $this->getRequest()->getPost('brands');				 $prices = $this->getRequest()->getPost('prices');				 $categories = $this->getRequest()->getPost('categories');				 				 $brandstr = implode(',', $brands );				 $pricestr = implode(',', $prices );				 $categorystr = implode(',', $categories );				                 $connectionWrite = Mage::getSingleton('core/resource')->getConnection('core_write');				 				$table = $connectionWrite->getTableName('guest_mystore_prefference');									$connectionWrite->beginTransaction();					$data = array();					$data['cookie_name']= $value;					$data['brand']= $brand;					$data['price']= $price;					$data['category']= $category;					$data['brands']= $brandstr;					$data['prices']= $pricestr;					$data['categories']= $categorystr;					$connectionWrite->insert($table, $data);					$connectionWrite->commit();				 if($connectionWrite->commit())				 Mage::getSingleton('customer/session')->addSuccess(Mage::helper('mystore')->__('The Preferences are saved successfully'));                            } 			 else  {  				 Mage::getSingleton('customer/session')->addError(Mage::helper('mystore')->__('Error: Your Preferences are not saved'));               }              $this->_redirectReferer();          }}