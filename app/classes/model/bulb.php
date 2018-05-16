<?php

class Model_Bulb extends \Orm\Model {
  
  protected static $_properties = [
      'id',
      'name',
      'price',
      'description',
      'in_stock',
      'type_id',
      'image_id',
  ];
  
  protected static $_table_name = 'bulb';

  // use $bulb->type to get the type
  // use $bulb->image to get the image
  protected static $_belongs_to = [
    'type' => [
        'model_to' => 'Model_Type',
    ],
    'image' => [
        'model_to' => 'Model_Image',
    ],
  ];
  
  // use $bulb->bags to get the orders of a product
  protected static $_many_many = [
      'bags' => [
          'model_to' => 'Model_Bag',
          'table_through' => 'item',
      ],
  ];
  
  // use $bulb->items to the selections of a product
  protected static $_has_many = [
    'items' => [
        'model_to' => 'Model_Item',
    ]
  ];  
}
