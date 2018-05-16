<?php

class Model_Bag extends \Orm\Model {
  
  protected static $_table_name = 'bag';
  
  protected static $_properties = [
      'id',
      'user_id',
      'made_on',
  ];

  // use $bag->bulbs to get the bulbs of the bag
  protected static $_many_many = [
    'bulbs' => [
       'model_to' => 'Model_Bulb',
       'table_through' => 'item',
    ],
  ];
  
  // use $bag->user to get the user of the bag
  protected static $_belongs_to = [
    'user' => [
        'model_to' => 'Model_User',
    ]
  ];
  
  // use $bag->items to get the items 
  // the cascade_delete is there to prevent an error message
  // on deleting the items of an bag
  protected static $_has_many = [
    'items' => [
       'model_to' => 'Model_Item',
       'cascade_delete'=> true,
    ]
  ];  
  
  // sets the made_on field to current timestamp, unless set manually
  protected static $_observers = [
      'Orm\Observer_CreatedAt' => [
         'events' => ['before_insert'],
         'mysql_timestamp' => true,
         'property' => 'made_on',
         'overwrite' => false,
     ],
  ];
}
