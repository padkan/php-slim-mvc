<?php
use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase{

    public function testIsTrue()
    {
        $myvar = true;
        $this->assert($myvar);
    }

}