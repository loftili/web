<?php

class DeviceModelTest extends TestCase {

  private $user;

  public function setUp() { 
    $a = User::where('email', '=', 'test@email.com')->first();
    if($a !== null)
      $a->delete();

    $user = new User;
    $user->first_name = "test";
    $user->last_name = "test";
    $user->email = "test@email.com";
    $user->save();

    $user->devices()->get();
  }

  public function testCreateDevice() {
    $a = new Device;
    $a->users()->get();
    $a->save();
  }


}
