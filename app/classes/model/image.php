<?php

class Model_Image extends \Orm\Model {
  
  protected static $_table_name = 'image';
  
  protected static $_properties = [
      'id',
      'name',
  ];
    
  // use $photo->products to get the products with this category
  protected static $_has_many = [
    'bulbs' => [
        'model_to' => 'Model_Bulb',
    ]
  ];  
}
