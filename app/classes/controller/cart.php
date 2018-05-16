<?php
/* --------------------------
    VALERIE HLAVINKA
    417 - USER INTERFACES
    PROGRAM 3
----------------------------*/

class Controller_Cart extends Controller_Base {

  public function before() {
    parent::before();
    if (is_null(Session::get('cart'))) {
      Session::set('cart', []);
    }
  }

  public function action_show($bulb_id) {
    $bulb = Model_Bulb::find($bulb_id);
    $amount = '';
    // use session cart to get amount
    $cart = Session::get('cart');
    if(!empty($cart[$bulb->id])){
          $amount = $cart[$bulb->id];
    }

    
    $data = [
        'bulb' => $bulb,
        'amount'=>$amount,
    ];
    return View::forge('home/showBulb.tpl', $data);
  }

  public function action_index() {
    $amount = Input::get('amount');
    $bulb_id = Input::get('bulb_id');
    if(is_null($bulb_id)){
        $bulb_id = 0;
    }

    if(isset($bulb_id)){
        //$bulb = Model_Bulb::find($bulb_id); 
        $cart = Session::get('cart');
        foreach($cart as $ck => $cv){
            if($ck == $bulb_id){
                unset($ck);
            }
        }
        $cart[$bulb_id] = $amount;
        Session::set('cart', $cart);
    }
      
    // process $cart, storing information into $cart_info
    $cart_info = [];
     
    if(!empty($cart)){
        foreach($cart as $ck => $cv){
            if($ck != 0 && $cv != 0){                          
                $bulb = Model_Bulb::find($ck);    
                $cart_info[$ck] = [ // generate cart info for each bulb
                    'name' => $bulb->name,
                    'bulb_id' => $bulb->id,
                    'type' => $bulb->type_id,
                    'price' =>  $bulb->price,
                    'amount' => $cv,
                    'sub_total' => (float)$cv * (float)$bulb->price
                ];
            }
        }
    }
    
    // calculate total
    $total_price = 0;
    foreach($cart_info as $c){
        $total_price += $c['sub_total'];
    }
    
    // create Bool so Make Bag From Cart button does not appear when cart is empty
    $empty_cart = False;
    foreach(Session::get('cart') as $k => $v){
        if(($k == 0) || ($v == 0)){
            $empty_cart = True;
        } else {
            $empty_cart = False;
        }
    }

    $data = [
        'session_dump' => var_export(Session::get(), true),
        'cart_info' => $cart_info,
        'total_price' => $total_price,
        'amount' => $amount,
        'bulb_id' => $bulb_id,
        'empty_cart' => $empty_cart,
    ];

    return View::forge('cart/index.tpl', $data);
  }
  
  public function action_changeAmount() {
    $amount = Input::get('amount');  
    $bulb_id = Input::get('bulb_id');
    
    //return 'changeAmount';
    return Response::redirect("/cart?amount=$amount&bulb_id=$bulb_id");
  }
  
  public function action_makeBag() {
      $cart = Session::get('cart');
      //return var_export($cart, true);
      
      Session::set('cart',[]);
      
      // create a bag
      $bag = Model_Bag::forge(); 
      $bag->user_id = Session::get('login')->id;
      $bag->made_on = date("Y-m-d H:i:s", time()); 
      $bag->save();    
      
     
      // create items
      foreach ($cart as $bulb_id => $amount) {
          if($bulb_id != 0 && $amount != 0){
            $item = Model_Item::forge();
            $item->bulb_id = $bulb_id;
            $item->bag_id = $bag->id;
            $item->amount = $amount;
            $bulb = Model_Bulb::find($bulb_id);
            $item->price = $bulb->price;
            $item->save();  
          }              
      }
    
      // redirect to My Bags
      return Response::redirect("/bags");
      
      
  }

}
