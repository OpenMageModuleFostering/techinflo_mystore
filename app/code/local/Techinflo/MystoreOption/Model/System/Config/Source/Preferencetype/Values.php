<?php

class Techinflo_MystoreOption_Model_System_Config_Source_Preferencetype_Values
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'brand',
                'label' => 'Brand',
            ),
            array(
                'value' => 'price',
                'label' => 'Price',
            ),
			array(
                'value' => 'category',
                'label' => 'Category',
            ),
        );
    }
}