<?php

class Validators {
    
  public static function addBulbValidator() {

    // custom validator for uniqueness
    $isUnique = function($name) {
      $bulbWithName = Model_Bulb::find('first', [
              'where' => [
                  [ 'name', $name ]
              ]
      ]);
      return is_null($bulbWithName);      
    };

    $validator = Validation::forge();
    
    // add in all fields set by the form
    
    $validator->add('name', 'name')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('min_length', 3)
            ->add_rule(['unique' => $isUnique])
    ;
    $validator->add('type', 'type')
    ;
    $validator->add('price', 'price')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('match_pattern', '/^([1-9][0-9]*|0)(\.[0-9]{2})?$/')
    ;
    $validator->add('in_stock', 'in_stock')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('match_pattern', '/^\d+$/')
    ;
    $validator->add('description','description')
    ;        
    $validator->add('image', 'image')
    ;

    // modify error messages
    $validator
        ->set_message('required', ':label cannot be empty')
        ->set_message('min_length', 'at least :param:1 char(s)')
        ->set_message('unique', 'a duplicate exists')
    ;
    $validator
        ->field('price')
        ->set_error_message('match_pattern', 'must be non-neg. integer or decimal number')
    ;  
        $validator
        ->field('in_stock')
        ->set_error_message('match_pattern', 'must be non-neg. integer')
    ; 
    
    return $validator;
  }
  
  public static  function modifyBulbValidator() {

    $validator = Validation::forge();
    
    // add in all fields set by the form
    $validator->add('name', 'name')
    ;
    $validator->add('type', 'type')
    ;
    $validator->add('price', 'price')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('match_pattern', '/^([1-9][0-9]*|0)(\.[0-9]{2})?$/')
    ;
    $validator->add('in_stock', 'in_stock')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('match_pattern', '/^\d+$/')
    ;
    $validator->add('description','description')
    ;        
    $validator->add('image', 'image')
    ;


    // modify error messages
    $validator
        ->set_message('required', ':label cannot be empty')
        ->set_message('min_length', 'at least :param:1 char(s)')
    ;
    $validator
        ->field('price')
        ->set_error_message('match_pattern', 'must be non-neg. integer or decimal number')
    ;
    $validator
        ->field('in_stock')
        ->set_error_message('match_pattern', 'must be non-neg. integer')
    ;    
    
    
    return $validator;
  }
  public static function addTypeValidator() {

    // custom validator for uniqueness
    $isUnique = function($name) {
      $typeWithName = Model_Type::find('first', [
              'where' => [
                  [ 'name', $name ]
              ]
      ]);
      return is_null($typeWithName);      
    };

    $validator = Validation::forge();
    
    // add in all fields set by the form  
    $validator->add('name', 'name')
        ->add_rule('trim')
        ->add_rule('required')
        ->add_rule('min_length', 3)
        ->add_rule(['unique' => $isUnique])
    ;
    // modify error messages
    $validator
        ->set_message('required', ':label cannot be empty')
        ->set_message('min_length', 'at least :param:1 char(s)')
        ->set_message('unique', 'a duplicate exists')
    ;      
    return $validator;
  }
  
  public static function signupValidator(){
    $isUnique = function($name) {
      $userWithName = Model_User::find('first', [
              'where' => [
                  [ 'name', $name ]
              ]
      ]);
      return is_null($userWithName);      
    };
    
    $validator = Validation::forge();
    
    $validator->add('name','name')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('min_length', 3)
            ->add_rule(['unique' => $isUnique])
    ;
    $validator->add('email','email')
            ->add_rule('required')            
            ->add_rule('valid_email')
    ;
    $validator->add('password','password')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('min_length', 3)       
    ;

    $validator->add('confirm','confirm')
            ->add_rule('match_field', 'password')
    ;
    
    $validator
        ->set_message('required', ':label cannot be empty')
        ->set_message('min_length', 'must be at least :param:1 char(s)')
        ->set_message('unique', 'a duplicate exists')
        ->set_message('match_value','passwords must match')
        ->set_message('valid_email', 'must be a valid email address')
        ->set_message('match_field', 'passwords must match')
    ;

    
    return $validator;
  }
}
