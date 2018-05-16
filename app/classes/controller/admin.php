<?php
/* --------------------------
    VALERIE HLAVINKA
    417 - USER INTERFACES
    PROGRAM 3
----------------------------*/

class Controller_Admin extends Controller_Base {
  public function before() {
    parent::before();
    if (is_null(Session::get('login'))) {
      return Response::redirect('/authenticate/login');
    }
    if (!Session::get('login')->is_admin) {
      return Response::redirect('/authenticate/noAccess');
    }
  }
/**************************
 * ADD A BULB
 **************************/
  public function action_addBulbInitial() {
    // pre-load types and images
    $types = [];
    $type_recs = Model_Type::find('all', [
                'order_by' => ['name']
    ]);
    foreach ($type_recs as $type_rec) {
      $types[$type_rec->id] = $type_rec->name;
    }
    
    // get images used
    $bulbs = Model_Bulb::find('all');
    $images_used = [];
    foreach($bulbs as $bulb){
      $images_used[] = $bulb->image->id;
    }   

    $images = []; // the final array
    $image_recs = Model_Image::find('all');

    foreach($image_recs as $image_rec) { // checking each of the loaded images
        $images[$image_rec->id] = $image_rec->name;
    }
    
    // filter out images already used from final array
    foreach($images as $image_key => $image_val){
      foreach($images_used as $iu){
        if($image_key == $iu){
          unset($images[$image_key]);
          break;
        }
      }
    }
    
    $validator = Validation::forge();  
    $data = [
        'name' => null,
        'types' => $types,
        'price' => null,
        'in_stock' => null,
        'description' => null,
        'images' => $images
    ];
    $view = View::forge("admin/addBulb.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }

  public function action_addBulb() {
    $cancel = Input::post('cancel');

    if (!is_null($cancel)) {
      return Response::redirect('/');
    }

    $types = [];
    $type_recs = Model_Type::find('all', [
                'order_by' => ['name']
    ]);
    foreach ($type_recs as $type_rec) {
      $types[$type_rec->id] = $type_rec->name;
    }
    
    // GET IMAGES START
    $bulbs = Model_Bulb::find('all');
    $images_used = [];
    foreach($bulbs as $b){
      $images_used[] = $b->image->id;
    }   
    $images = []; // the final array
    $image_recs = Model_Image::find('all');
    foreach($image_recs as $image_rec) { // checking each of the loaded images
        $images[$image_rec->id] = $image_rec->name;
    }    
    // filter out images already used from final array
    foreach($images as $image_key => $image_val){
      foreach($images_used as $iu){
        if($image_key == $iu){
          unset($images[$image_key]);
          break;
        }
      }
    }
    // GET IMAGES END 
    
    $validator = Validators::addBulbValidator();
    $message = "";
    
    try {
      $validated = $validator->run(Input::post());
      if(!$validated){
        throw new Exception();
      }
      $validData = $validator->validated();
      
      $bulb = Model_Bulb::forge();
      $bulb->name = $validData['name'];
      $bulb->type_id = $validData['type'];
      $bulb->price = $validData['price'];
      $bulb->in_stock = $validData['in_stock'];        
      $bulb->description = $validData['description'];
      $bulb->image_id = $validData['image'];
      $bulb->save();
      
      return Response::redirect('/');
    } catch (Exception $ex) {
      $message = $ex->getMessage();
    }
    
    $data = [
      'name' => Input::post('name'),
      'types' => $types,
      'price' => Input::post('price'),
      'in_stock' => Input::post('in_stock'),
      'description' => Input::post('description'),
      'images' => $images,
      'message' => $message,
    ];
    $view = View::forge("admin/addBulb.tpl", $data);
    $view->set_safe('validator', $validator);
    return $view;
  }

 /**************************
 * ADD A TYPE
 **************************/
  public function action_addTypeInitial() {
    $types = [];
    $type_recs = Model_Type::find('all', [
                'order_by' => ['name']
    ]);
    foreach($type_recs as $type_rec) {
      $types[$type_rec->id] = $type_rec->name;
    }
    $validator = Validation::forge();  
    $data = [
      'types' => $types,
      'name'  => null,

    ];    
    $view = View::forge("admin/addType.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }
  
  public function action_addType() {
    $cancel = Input::post('cancel');
    
    if(!is_null($cancel)){
      return Response::redirect('/');
    }
    
    $types = [];
    $type_recs = Model_Type::find('all', [
                'order_by' => ['name']
    ]);
    foreach ($type_recs as $type_rec) {
      $types[$type_rec->id] = $type_rec->name;
    }
    
    $validator = Validators::addTypeValidator();
    $message = "";
    
    try {
      $validated = $validator->run(Input::post());
      if (!$validated) {
        throw new Exception();
      }
      $validData = $validator->validated();
      $type = Model_Type::forge();
      $type->name = $validData['name'];
      $type->save();
      
      return Response::redirect("/admin/addTypeInitial");
    } catch (Exception $ex) {
      $message = $ex->getMessage();
    }
    $data = [
        'types' => $types,
        'name' => Input::post('name'),
        'message' => $message,
    ];
    $view = View::forge("admin/addType.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }
  
/**************************
 * MODIFY A BULB
 **************************/
  public function action_modifyBulbInitial($bulb_id) {
    $bulb = Model_Bulb::find($bulb_id);


    // GET IMAGES START
    $bulbs = Model_Bulb::find('all');
    $images_used = [];
    foreach($bulbs as $b){
      $images_used[] = $b->image->id;
    }   
    $images = []; // the final array
    $image_recs = Model_Image::find('all');
    foreach($image_recs as $image_rec) { 
        $images[$image_rec->id] = $image_rec->name;
    }    
    // filter out images already used from final array
    foreach($images as $image_key => $image_val){
      foreach($images_used as $iu){
        if($image_key == $iu && $image_key != $bulb->image->id){
          unset($images[$image_key]);
          break;
        }
      }
    }
    // GET IMAGES END
    
    $validator = Validation::forge();
    $data = [
        'name' => $bulb->name,
        'type' => $bulb->type_id,
        'price' => $bulb->price,
        'in_stock' => $bulb->in_stock,
        'description' => $bulb->description,
        'images' => $images,
        'image' => $bulb->image_id,
        'bulb_id' => $bulb_id,
      
    ];
    $view = View::forge("admin/modifyBulb.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }

  public function action_modifyBulb($bulb_id) {
    $cancel = Input::get('cancel');
    if (isset($cancel)) {
      return Response::redirect('/');
    }
    $bulb = Model_Bulb::find($bulb_id);
    $type = Model_Type::find($bulb->type_id);
    
    // GET IMAGES START
    $bulbs = Model_Bulb::find('all');
    $images_used = [];
    foreach($bulbs as $b){ // build array of images already used
      $images_used[] = $b->image->id;
    }   
    $images = []; // the final array
    $image_recs = Model_Image::find('all');
    foreach($image_recs as $image_rec) { // load all images
        $images[$image_rec->id] = $image_rec->name;
    }    
    // filter out images already used from final array
    foreach($images as $image_key => $image_val){
      foreach($images_used as $iu){
        if($image_key == $iu && $image_key != $bulb->image->id){
          unset($images[$image_key]);
          break;
        }
      }
    }
    // GET IMAGES END   
    
    // VALIDATE AND STORE MODIFICATIONS
    $validator = Validators::modifyBulbValidator();
    $message = "";
    
    try {
      $validated = $validator->run(Input::post());
      if(!$validated){
        throw new Exception();
      }
      $validData = $validator->validated();
      $bulb->price = $validData['price'];
      $bulb->in_stock = $validData['in_stock'];        
      $bulb->description = $validData['description'];
      $bulb->image_id = $validData['image'];
      $bulb->save();
      
      return Response::redirect('/');
    } catch (Exception $ex) {
      $message = $ex->getMessage();
    }
    // END VALIDATE AND STORE MODIFICATIONS
    
    $data = [
        'name' => $bulb->name,
        'type' => $type->name,
        'price' => Input::post('price'),
        'in_stock' => Input::post('in_stock'),
        'description' => Input::post('description'),
        'images' => $images,
        'image' => $bulb->image_id,
        'bulb_id' => $bulb_id,
        'message'=>$message,
    ];       
    $view = View::forge("admin/modifyBulb.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }

  /**************************
 * ALL BAGS
 **************************/  
  public function action_allBags() {
    //return 'all bags';
    $bags = Model_Bag::find('all');
    foreach($bags as $b){
        $users = Model_User::find('first', [
            "where" => ['id' => $b->user_id]
        ]);
    }   
    
    $data = [
      'bags' => $bags  
    ];
    return View::forge('admin/allBags.tpl', $data);
  }
  
/**************************
 * PROCESS A BAG
 **************************/  
  public function action_processBag() {
    //return 'process bags';
    $bag_id = Input::get('bag_id');
    $confirm = Input::get('confirm');
    
    if (!$confirm) {
      // go back with message, button title change, and confirm setting
      Session::set_flash('confirm', 1);
      Session::set_flash('message', 'Press again to confirm');
      Session::set_flash('button_title', "Confirm Process");
      return Response::redirect("/bags/show/$bag_id");
    }
    
    $bag = Model_Bag::find($bag_id);
    $items = Model_Item::find('all', [
        'where'=> ["bag_id" => $bag->id]
    ]);
    
    // check stock for each bulb first
    foreach($items as $item){
        $bulb = Model_Bulb::find($item->bulb_id);
        if($bulb->in_stock < $item->amount){
            Session::set_flash('message', "Insufficient stock");
            return Response::redirect("/bags/show/$bag_id");
        } 
    }
    
    // update stock for each bulb
    foreach($items as $item){
        $bulb = Model_Bulb::find($item->bulb_id);
        $bulb->in_stock -= $item->amount;
        $bulb->save();
    }

    // trash processed items and the bag
    foreach($items as $item){
        $item->delete();
    }
    $bag->delete();
    
    Session::set_flash('message', "Bag #$bag_id was successfully processed");
    
    return Response::redirect('/admin/allBags');
  }

}



