<?php

class Techinflo_Mystore_Helper_Data extends Mage_Core_Helper_Abstract
 {
    public function isEnabled()
    { 		
        return Mage::getStoreConfig('techinflo/mystoreoption/active');      
    }
    
    public function getCategoriesDropdown() {

    $categoriesArray = Mage::getModel('catalog/category')
            ->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSort('path', 'asc')
            ->addFieldToFilter('is_active', array('eq'=>'1'))
            ->load()
            ->toArray();


    foreach ($categoriesArray as $categoryId => $category) {
        if (isset($category['name'])) {
            $categories[] = array(
                'label' => $category['name'],
                'level'  =>$category['level'],
                'value' => $categoryId
            );
        }
    }
    return $categories;
  }
 }