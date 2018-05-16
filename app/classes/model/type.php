<?php

class Model_Type extends \Orm\Model {

  protected static $_table_name = 'type';
  
  protected static $_properties = [
      'id',
      'name',
  ];
  
  // use $type->bulbs to get the bulbs with this type
  protected static $_has_many = [
      'bulbs' => [
          'model_to' => 'Model_Bulb',
      ]
  ];
}
