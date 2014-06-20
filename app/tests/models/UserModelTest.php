<?php

use Rhumsaa\Uuid\Uuid;

class UserModelTest extends TestCase {

  public function testUniqueUidError() {
    $uuid = Uuid::uuid1()."";

    $a = new User;
    $b = new User;
    
    $a->first_name = "test";
    $a->last_name = "test";
    $a->email = "test2@email.com";

    $b->first_name = "test";
    $b->last_name = "test";
    $b->email = "test@email.com";

    $a->uid = $uuid;
    $b->uid = $uuid;

    $a->save();
    $exception_code = false;
    try {
      $b->save();
    } catch(Exception $e) {
      $exception_code = $e->getCode();
    }

    $this->assertEquals($exception_code, 23000);
  }


}
