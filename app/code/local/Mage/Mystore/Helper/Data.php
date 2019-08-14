<?php

class Mage_Mystore_Helper_Data extends Mage_Core_Helper_Abstract
 {
    public function isEnabled()
    { 		
        return Mage::getStoreConfig('techinflo/mystoreoption/active');      
    }
 }
 
 ?>