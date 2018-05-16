<?php

namespace Fuel\Tasks;

use Model_Type;
use Model_Bag;
use Model_Image;
use Model_User;
use Model_Item;
use Model_Bulb;

class PopulateTables {

  public static function run() {

    echo "\n---- users\n";

    $user_data = [
        ["john", "arachnid@oracle.com", "john"],
        ["kirsten", "buffalo@go.com", "kirsten"],
        ["bill", "digger@gmail.com", "bill"],
        ["mary", "elephant@wcupa.edu", "mary"],
        ["joan", "kangaroo@upenn.edu", "joan"],
        ["alice", "feline@yahoo.com", "alice"],
        ["carla", "badger@esu.edu", "carla"],
        ["dave", "warthog@temple.edu", "dave"],
    ];

    foreach ($user_data as $data) {
      list($name, $email, $password) = $data;
      $user = Model_User::forge();
      $user->name = $name;
      $user->email = $email;
      $user->password = hash('sha256', $password);
      $user->save();
      echo "user $user->id: $name\n";
    }

    echo "\n---- admins\n";

    foreach (['dave', 'carla'] as $name) {
      $user = Model_User::find('first', [
              'where' => ['name' => $name],
      ]);
      $user->is_admin = true;
      $user->save();
      echo "admin: $name\n";
    }

    echo "\n---- types\n";

    foreach ([
    'Primrose',
    'Dahlia',
    'Begonia',
    'Ground Cover',
    'Daisy',
    ]
    as $name) {
      $type = Model_Type::forge();
      $type->name = $name;
      $type->save();
      echo "$type->id: $name\n";
    }

    echo "\n---- images\n\n";

    $images_dir = DOCROOT . "public/assets/img/bulbs/";

    // get all files in $images_dir minus the UNIX "." and ".."
    $imageFiles = array_diff(scandir($images_dir), [".", ".."]);
    foreach ($imageFiles as $file) {
      $image = Model_Image::forge();
      $image->name = $file;
      $image->save();
      echo "$image->id: $file\n";
    }

    echo "\n---- bulbs\n\n";

    $bulbs = [];

    require_once __DIR__ . "/bulb_data.php";

    foreach ($bulb_data as $name => $data) {
      echo "===> $name\n";
      if (!isset($data['type'])) {
        echo "omitting $name\n";
        continue;
      }

      $type = Model_Type::find('first', [
              'where' => [['name', $data['type']]],
      ]);

      if (is_null($type)) {
        throw new Exception("missing type: {$data['type']}");
      }

      $image_name = preg_replace("/ /", "", $name) . ".jpg";

      $image = Model_Image::find('first', [
              'where' => [['name', $image_name]],
      ]);

      if (is_null($image)) {
        throw new Exception("missing image: $image_name");
      }

      $bulb = Model_Bulb::forge();
      $bulb->name = $name;
      $bulb->type_id = $type->id;
      $bulb->image_id = $image->id;
      $bulb->price = $data['price'];
      $bulb->in_stock = $data['in_stock'];
      $bulb->description = $data['description'];
      $bulb->save();

      $bulbs[$bulb->id] = $bulb;

      echo "OK\n";
    }

    echo "\n---- bags\n";

    define("SECONDS_PER_DAY", 3600 * 24);

    function randTimeNdaysPast($days) {
      $timestamp = time() - $days * SECONDS_PER_DAY + rand(0, SECONDS_PER_DAY);
      return date("Y-m-d H:i:s", $timestamp);
    }

    function makeBag($user, $ndays, $bulbAmount) {
      $bag = Model_Bag::forge();
      $bag->user_id = $user->id;
      $bag->made_on = randTimeNdaysPast($ndays);
      $bag->save();
      echo "\nby $user->name on $bag->made_on\n";
      foreach ($bulbAmount as $arr) {
        list($bulb, $amount) = $arr;
        echo " #$bulb->id: $bulb->name ($amount)\n";
        $item = Model_Item::forge();
        $item->bag = $bag;
        $item->bulb = $bulb;
        $item->amount = $amount;
        $item->price = $bulb->price;
        $item->save();
      }
    }

    $alice = Model_User::find('first', [
            'where' => [['name', 'alice']],
    ]);
    $john = Model_User::find('first', [
            'where' => [['name', 'john']],
    ]);
    $bill = Model_User::find('first', [
            'where' => [['name', 'bill']],
    ]);

    $ndays = 7;
    
    makeBag($alice, $ndays--, [
        [$bulbs[1], 22],
        [$bulbs[5], 33],
    ]);

    makeBag($alice, $ndays--, [
        [$bulbs[12], 43],
        [$bulbs[8], 41],
    ]);

    makeBag($bill, $ndays--, [
        [$bulbs[2], 15],
        [$bulbs[6], 52],
    ]);

    makeBag($alice, $ndays--, [
        [$bulbs[3], 46],
        [$bulbs[11], 71],
    ]);

    makeBag($bill, $ndays--, [
        [$bulbs[1], 73],
        [$bulbs[3], 37],
        [$bulbs[5], 51],
        [$bulbs[6], 21],
    ]);
  }

}
