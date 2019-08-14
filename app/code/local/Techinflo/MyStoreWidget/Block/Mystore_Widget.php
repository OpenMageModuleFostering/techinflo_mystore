<?php
class Techinflo_MyStoreWidget_Block_Mystore_Widget
    extends Mage_Core_Block_Abstract
    implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
		$html ='';
        $html .= 'mystore_widget parameter1 = '.$this->getData('parameter1').'<br/>';
        $html .= 'mystore_widget parameter2 = '.$this->getData('parameter2').'<br/>';
        $html .= 'mystore_widget parameter3 = '.$this->getData('parameter3').'<br/>';
        $html .= 'mystore_widget parameter4 = '.$this->getData('parameter4').'<br/>';
        $html .= 'mystore_widget parameter5 = '.$this->getData('parameter5').'<br/>';
        return $html;
    }
	
}