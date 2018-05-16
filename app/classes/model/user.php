<?php

class Model_User extends \Orm\Model {
  
  protected static $_table_name = 'user';

  protected static $_properties = [
    'id',
    'name',
    'email',
    'password',
    'is_admin' => [
        'default' => false,
    ],
  ];
 
  // use $user->bags to get the bags the user owns
  protected static $_has_many = [
    'bags' => [
        'model_to' => 'Model_Bag',

// you can impose conditions on the records orders gotten
// from the user. we will ignore it for simplicity

//        'conditions' => [
//            'order_by' => ['made_on' => 'desc',]
//        ],
    ]
  ];
}
