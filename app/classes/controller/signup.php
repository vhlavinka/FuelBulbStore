<?php
/* --------------------------
    VALERIE HLAVINKA
    417 - USER INTERFACES
    PROGRAM 3
----------------------------*/

class Controller_Signup extends Controller_Base {

  public function before() {
    if (Session::get('login')) {
      return Response::redirect('/');
    }
  }

  public function action_index() { 
    $validator = Validation::forge();
    $data = [
        
    ];
    $view = View::forge("home/signup.tpl", $data);
    $view->set_safe('validator', $validator); 
    return $view;
  }
  
  public function action_submit() {
    
    $cancel = Input::post('cancel');
    if(!is_null($cancel)){
      return Response::redirect('/');
    }

    $validator = Validators::signupValidator();
    $message = "";
    try{
      $validated = $validator->run(Input::post());
      if(!$validated){
        throw new Exception();
      }
      
      $validData = $validator->validated();
      
      $user = Model_User::forge();
      $user->name = $validData['name'];
      $user->email = $validData['email']; 
      $user->password = $validData['password']; 
      // authenticator attempts to decrypt this password so can't log in
 
      $user->save();
      
      return Response::redirect('authenticate/login');
      
    } catch (Exception $ex) {
      $message = $ex->getMessage();
    }
    $data = [  
        'name' => Input::post('name'),
        'email' => Input::post('email'),
        'password' => Input::post('password'),
        'confrim' => Input::post('confirm'),
    ];
    $view = View::forge("home/signup.tpl", $data);
    $view->set_safe('validator', $validator);
    return $view;
  }

}

