<?php

class UserModelTest extends TestCase {

  public function setUp() {
    $a = User::where('email', '=', 'test@email.com')->first();
    if($a !== null)
      $a->delete();
  }

  public function testDuplicateEmailError() {
    $a = new User;
    $b = new User;
    
    $a->first_name = "test";
    $a->last_name = "test";
    $a->email = "test@email.com";

    $b->first_name = "test";
    $b->last_name = "test";
    $b->email = "test@email.com";

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
