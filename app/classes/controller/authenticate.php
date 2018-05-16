<?php

class Controller_Authenticate extends Controller_Base {

  public function action_login() {
    if (!is_null(Session::get('login'))) {
      return Response::redirect("/");
    }
    /* We want to pass username flash variable from the controller, 
     * rather than retrieve it in login.tpl so that it is sanitized.
     */
    $view = View::forge("authenticate/login.tpl");
    $view->set('username', Session::get_flash('username'));
    return $view;
  }

  public function action_validate() {
    $username = Input::post('username');
    $password = Input::post('password');
    $trim_username = trim($username);
    
    $user = Model_User::find('first', [
        'where'=> [ "name" => $trim_username ],
    ]);
    if (is_null($user)) {
      Session::set_flash('username', $trim_username);
      Session::set_flash('message', 'invalid user');
      return Response::redirect('/authenticate/login');
    }
    elseif (hash('sha256', $password) === $user->password) {
      $login = (object) [
         'id' => $user->id,
         'name' => $user->name,
         'is_admin' => $user->is_admin,
      ];
      Session::set('login', $login);
      return Response::redirect('/');      
    }
    else {
      Session::set_flash('username', $username);
      Session::set_flash('message', 'invalid password');
      return Response::redirect('/authenticate/login');
    }
  }

  public function action_logout() {
    Session::delete('login');
    return Response::redirect('/');      
  }
  
  public function action_noaccess() {
    return View::forge("authenticate/noAccess.tpl");
  }
}
