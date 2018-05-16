<?php
/* --------------------------
    VALERIE HLAVINKA
    417 - USER INTERFACES
    PROGRAM 3
----------------------------*/

class Controller_Home extends Controller_Base {

  public function before() {
    parent::before();
    if (is_null(Session::get('order'))) {
      Session::set('order', 'name');
    }
  }
  

  public function action_index() { 

    $doit = Input::post('doit');
    $dd = Input::post('dd');
    if (!is_null($doit)) {
      Session::set('type_id',$dd);
    }
    
    $types[0] = "-- ALL --";
    foreach (Model_Type::find('all') as $type) {
        $types[$type->id] = $type->name;
    }
    
    // if a type is selected from drop down menu
    if(!is_null(Session::get('type_id')) && Session::get('type_id') != 0){
        $bulbs = Model_Bulb::find('all', [
            'where' => ["type_id" => Session::get('type_id')],
            "order_by" => [Session::get('order')],
        ]);
    // if -- ALL -- is selected
    } elseif (is_null(Session::get('type_id')) || Session::get('type_id') == 0){
        $bulbs = Model_Bulb::find('all', [
            "order_by" => [Session::get('order')],
        ]);
        
        //Session::set('type_id', 0);
    }
        
    $data = [
        'bulbs' => $bulbs,
        'types' => $types,
        'dd' => Session::get('dd')
       // 'type_id' => Session::get('type_id')     
    ];
    return View::forge('home/index.tpl', $data);
  }
  
    public function action_setOrder($field) {
    //return "setOrder: $field";

    Session::set('order',$field);
    return Response::redirect("/");
  }
  

}
