<?php
/**
 * Mystore Extension for User shopping preferences
 * @category     Techinflo
 * @package     Techinflo_MystoreOption
 * @author      Techinflo
 */
class Techinflollp_MystoreOption_Block_View extends Mage_Core_Block_Template
{	
	
	public function __construct()
	{	
		
	}
	public function getOverlayContent($t1){
		$enable = $this->getIsActive();
		$content_mode =  $this->getContentMode();
		$static_block_id =  $this->getStaticBlockId();
		$cms_page_id =  $this->getCmsPageId();
		$category_dentifire = $this->getCategoryIdentifire();
		$product_identifire = $this->getProductIdentifire();
		if(!$enable) return false;
		if(!$t1){
			$t1 = "default";
		}
		if($content_mode == 'static'){
			
			if($t1 == "category" && $category_dentifire ){
				return $this->getLayout()->createBlock('cms/block')->setBlockId($category_dentifire)->toHtml();
			}
			elseif($t1 == "product" && $product_identifire ){
				return $this->getLayout()->createBlock('cms/block')->setBlockId($product_identifire)->toHtml();
			}
			else{
				if($static_block_id){
					return $this->getLayout()->createBlock('cms/block')->setBlockId($static_block_id)->toHtml();
				}
			}			
		}
		elseif($content_mode == 'cms') {
			if($t1 == "category" && $category_dentifire){
				return Mage::getModel('cms/page')->load($category_dentifire,'identifier')->getContent();
			}
			elseif($t1 == "product" && $product_identifire){
				return Mage::getModel('cms/page')->load($product_identifire,'identifier')->getContent();
			}
			else{
				if($cms_page_id){
					return Mage::getModel('cms/page')->load($cms_page_id,'identifier')->getContent();
				}
			}	
		} 
		
	}
	public function getIsActive(){
		if(Mage::getStoreConfig("techinflo/general/active")) 
			return true;
		else 
			return false;
	}
	public function getContentMode(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/dropdown_overlay_content"))
			return Mage::getStoreConfig("techinflo_mystoreoption/dropdown_overlay_content");
		else
			return "";
	}
	public function getStaticBlockId(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/dependant_text_field_staticblock"))
			return Mage::getStoreConfig("techinflo_mystoreoption/dependant_text_field_staticblock");
		else
			return '';
	}
	public function getCmsPageId(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/dependant_text_field_cmspage"))
			return Mage::getStoreConfig("techinflo_mystoreoption/dependant_text_field_cmspage");
		else
			return '';
	}
	public function getOverlaySizeIn(){
		return Mage::getStoreConfig("techinflo_mystoreoption/dropdown");
	}
	public function getOverlayHeight(){
		if($this->getOverlaySizeIn() == "pixel"){
			if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_height"))
				return Mage::getStoreConfig("techinflo_mystoreoption/text_field_height").'px';
			else
				return "auto";
		}
		elseif($this->getOverlaySizeIn() == "percent"){
			if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_height"))
				return Mage::getStoreConfig("techinflo_mystoreoption/text_field_height").'%';
			else
				return "auto";
		}
	}
	public function getOverlayWeight(){
		if($this->getOverlaySizeIn() == "pixel"){
			if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_width"))
				return Mage::getStoreConfig("techinflo_mystoreoption/text_field_width").'px';
			else
				return "auto";
		}
		elseif($this->getOverlaySizeIn() == "percent"){
			if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_width"))
				return Mage::getStoreConfig("techinflo_mystoreoption/text_field_width").'%';
			else
				return "auto";
		}
	}
	public function getOverlayTitle(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/boolean")) {
			return Mage::getStoreConfig("techinflo_mystoreoption/dependant_text_field");
		}
		else {
			return false;
		}
	}
	public function getOverlayPages(){
		$pages = array();
		$pages = explode(',',Mage::getStoreConfig("techinflo_mystoreoption/multiple_dropdown"));
		return $pages;
	}
	public function getCategoryIdentifire(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_category")) {
			return Mage::getStoreConfig("techinflo_mystoreoption/text_field_category");
		}
		else {
			return false;
		}
	}
	public function getProductIdentifire(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_product")) {
			return Mage::getStoreConfig("techinflo_mystoreoption/text_field_product");
		}
		else {
			return false;
		}
	}
	public function getCookieExpireTime(){
		if(Mage::getStoreConfig("techinflo_mystoreoption/text_field_cookie_time")) {
			return Mage::getStoreConfig("techinflo_mystoreoption/text_field_cookie_time");
		}
		else {
			return false;
		}
	}
}
?>