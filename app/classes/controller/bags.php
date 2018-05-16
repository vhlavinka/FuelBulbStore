<?php
/* --------------------------
    VALERIE HLAVINKA
    417 - USER INTERFACES
    PROGRAM 3
----------------------------*/

class Controller_Bags extends Controller_Base {

  public function before() {
    parent::before();
    $login = Session::get('login');
    if (is_null($login)) {
      return Response::redirect('/authenticate/login');
    }
    $this->user = Model_User::find($login->id);
  }
  
  public function action_show($bag_id) {      
      //return $bag_id;
    $bag = Model_Bag::find($bag_id) ;
    $user = Model_User::find('first', [
        "where" => ['id' => $bag->user_id]
    ]);

    $items = Model_Item::find('all', [
        "where" => ["bag_id" => $bag_id]]);  
    foreach($items as $i){
        $bulbs = Model_Bulb::find('all', [
            "where" => ["id" => $i->bulb_id]
        ]);
    }
    
    $total = 0;
    foreach ($items as $item) {
        $total += $item->amount * $item->bulb->price;
    }
 
    $button_title                                           
        = is_null(Session::get('button_title')) ? "Process" : Session::get('button_title');
    Session::set('button_title', NULL);
    
    $data = [
        'bag' => $bag,
        'bag_id'=>$bag_id,
        'items' => $items,
        'total' => $total,
        'user' => $user,
        'button_title' => $button_title,
    ];
    return View::forge('bags/showBag.tpl', $data);
  }

  public function action_index() {
    $user_id = Session::get('login');
    
    $bags = Model_Bag::find('all', [
            "where" => ["user_id" => $user_id->id],
    ]);
    
    $data = [
        'bags' => $bags,
    ];
    return View::forge('bags/index.tpl', $data);
  }

}