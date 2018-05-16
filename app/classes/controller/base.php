<?php
class Controller_Base extends Controller {
  
  public function after($response) {
    $response = parent::after($response);
    $response->set_header(
      'Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
    return $response;
  }
}
