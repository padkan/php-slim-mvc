<?php

use PHPUnit\Framework\TestCase;

include("lib/validator.class.php");

class ValidatorTest extends TestCase{

    public function testGetIsValidReturnsTrue()
    {
        $valid_data = array(
            'email' => 'test@test.com',
            'login' => 'user12',
            'password' => '1234',
            'confirm_password' => '1234',

        );

        $validator = new Validator($valid_data);
        $validator->validate();
        $this->assert($validator->getIsValid());

    }
}

