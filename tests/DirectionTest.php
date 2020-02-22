<?php
require_once __DIR__ . "/../src/Robot.php";
require_once __DIR__ . "/../src/Constant.php";

use PHPUnit\Framework\TestCase;

final class DirectionTest extends TestCase
{
    public function testLeft()
    {
        $robot = new Robot();
        $robot->left();
        $this->assertEquals($robot->getFace(), Constant::WEST);
        $robot->left();
        $this->assertEquals($robot->getFace(), Constant::SOUTH);
        $robot->left();
        $this->assertEquals($robot->getFace(), Constant::EAST);
        $robot->left();
        $this->assertEquals($robot->getFace(), Constant::NORTH);
        
    }

    public function testRight()
    {
        $robot = new Robot();
        $robot->right();
        $this->assertEquals($robot->getFace(), Constant::EAST);
        $robot->right();
        $this->assertEquals($robot->getFace(), Constant::SOUTH);
        $robot->right();
        $this->assertEquals($robot->getFace(), Constant::WEST);
        $robot->right();
        $this->assertEquals($robot->getFace(), Constant::NORTH);
    }
}