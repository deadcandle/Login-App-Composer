<?php

use \PHPUnit\Framework\TestCase;
use \LoginOpdracht\User;

class UserTest extends TestCase {

    # Test of het user object kan worden aangemaakt
    public function testCanCreateUser() {
        $user = new User;
        $this->assertNotNull($user);
    }
    
    # Test of de user zijn wachtwoord kan veranderen
    public function testSetAndGetPassword() {
        $user = new User;
        $user->setPassword("NewPassword");
        $errors = $user->ValidateUser();
        $this->assertContains("Invalid username", $errors);
    }

    # Test of de user kan inloggen
    public function testLoginUser() {
        $user = new User;
        $user->username = "tobi";
        $user->setPassword("123");
        $this->assertTrue($user->LoginUser());
    }

    # Test of de user bij een fout wachtwoord gewaarschuwt wordt
    public function testLoginUserFail() {
        $user = new User;
        $user->username = "tobi";
        $user->setPassword("fout");
        $this->assertFalse($user->LoginUser());
    }

}
?>