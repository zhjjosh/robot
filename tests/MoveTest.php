<?php
require_once __DIR__ . "/../src/Robot.php";
require_once __DIR__ . "/../src/Constant.php";

use PHPUnit\Framework\TestCase;

final class MoveTest extends TestCase
{
    public function testValidMove()
    {
        $robot = new Robot();
        //move North
        $robot->move();
        $this->assertEquals($robot->getPositionY(), 1);
        //move East
        $robot->right();
        $robot->move();
        $this->assertEquals($robot->getPositionX(), 1);
        //move South
        $robot->right();
        $robot->move();
        $this->assertEquals($robot->getPositionY(), 0);
        //move West
        $robot->right();
        $robot->move();
        $this->assertEquals($robot->getPositionX(), 0);
    }

    public function testInvalidMove()
    {
        $robot = new Robot();
        //move North
        $robot->place('0,' . (Constant::MAX_Y - 1) . ',NORTH');
        $this->assertFalse($robot->validateMove());
        //move East
        $robot->place((Constant::MAX_X - 1) . ',0,EAST');
        $this->assertFalse($robot->validateMove());
        //move South
        $robot->place('0,0,SOUTH');
        $this->assertFalse($robot->validateMove());
        //move West
        $robot->place('0,0,WEST');
        $this->assertFalse($robot->validateMove());
    }
}
