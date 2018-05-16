<?php

class Model_Item extends \Orm\Model {
  
  protected static $_table_name = 'item';
  
  protected static $_properties = [
      'id',
      'bag_id',
      'bulb_id',
	  'price',
      'amount',
  ];

  // use $item->bulb to get the bulb that owns this item
  // use $item->bag to get the bag that owns this item
  protected static $_belongs_to = [
    'bulb' => [
        'model_to' => 'Model_Bulb',
    ],
    'bag' => [
        'model_to' => 'Model_Bag',
    ]
  ];
}
