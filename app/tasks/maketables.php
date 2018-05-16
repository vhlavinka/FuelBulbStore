<?php

namespace Fuel\Tasks;

require_once 'createtables.php';
require_once 'populatetables.php';

class MakeTables {

  public static function run() {
    CreateTables::run();
    PopulateTables::run();
  }

}
