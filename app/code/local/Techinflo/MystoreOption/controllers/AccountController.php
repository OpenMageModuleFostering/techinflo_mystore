<?php
/**
 * Customer account controller
 *
 * @category   Mage
 * @package    Mage_Customer
 * @author      Magento Core Team <core@magentocommerce.com>
 */

 
require_once 'Mage/Customer/controllers/AccountController.php';

class Techinflo_MystoreOption_AccountController extends Mage_Customer_AccountController
{
    public function createPostAction(){
	
	    if($this->getRequest()->isPost())
		{
				$email = $this->getRequest()->getPost('email');   
				
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
				
				//$sql_query = "DELETE FROM `customer_mystore_prefference` WHERE customer_email = '$email'";
				
				//$connectionWrite->query($sql_query);
				 
				$table = $connectionWrite->getTableName('customer_mystore_prefference');
				
					$connectionWrite->beginTransaction();
					$data = array();
					$data['customer_email']= $email;
					$data['brand']= $brand;
					$data['price']= $price;
					$data['category']= $category;
					$data['brands']= $brandstr;
					$data['prices']= $pricestr;
					$data['categories']= $categorystr;
					$connectionWrite->insert($table, $data);
					$connectionWrite->commit();

				 if(!$connectionWrite->commit())
				
				exit(0);
				              
             }
			 
			 
        /** @var $session Mage_Customer_Model_Session */
        $session = $this->_getSession();
        if ($session->isLoggedIn()) {
            $this->_redirect('*/*/');
            return;
        }
        $session->setEscapeMessages(true); // prevent XSS injection in user input
        if (!$this->getRequest()->isPost()) {
            $errUrl = $this->_getUrl('*/*/create', array('_secure' => true));
            $this->_redirectError($errUrl);
            return;
        }

        $customer = $this->_getCustomer();

        try {
            $errors = $this->_getCustomerErrors($customer);

            if (empty($errors)) {
                $customer->save();
                $this->_dispatchRegisterSuccess($customer);
                $this->_successProcessRegistration($customer);
                return;
            } else {
                $this->_addSessionError($errors);
            }
        } catch (Mage_Core_Exception $e) {
            $session->setCustomerFormData($this->getRequest()->getPost());
            if ($e->getCode() === Mage_Customer_Model_Customer::EXCEPTION_EMAIL_EXISTS) {
                $url = $this->_getUrl('customer/account/forgotpassword');
                $message = $this->__('There is already an account with this email address. If you are sure that it is your email address, <a href="%s">click here</a> to get your password and access your account.', $url);
                $session->setEscapeMessages(false);
            } else {
                $message = $e->getMessage();
            }
            $session->addError($message);
        } catch (Exception $e) {
            $session->setCustomerFormData($this->getRequest()->getPost())
                ->addException($e, $this->__('Cannot save the customer.'));
        }
        $errUrl = $this->_getUrl('*/*/create', array('_secure' => true));
        $this->_redirectError($errUrl);
    }
}