<?php
class MyExtensions {
  public function __construct(Smarty $smarty) {
    $session = Session::forge();
    $smarty->assign('session', $session);
  }
}
