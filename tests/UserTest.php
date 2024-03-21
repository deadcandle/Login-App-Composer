<?php

use \PHPUnit\Framework\TestCase;
use \LoginOpdracht\User;

class UserTest extends TestCase {

    public function testCanCreateUser() {
        $user = new User;
        $this->assertNotNull($user);
    }
    
    public function testSetAndGetPassword() {
        $user = new User;
        $user->setPassword("NewPassword");
        $errors = $user->ValidateUser();
        $this->assertContains("Invalid username", $errors);
    }

    public function testLoginUser() {
        $user = new User;
        $user->username = "gebruikersnaam";
        $user->setPassword("wachtwoord");
        $this->assertTrue($user->LoginUser());
    }

}
?>