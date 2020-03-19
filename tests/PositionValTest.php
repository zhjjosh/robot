<?php
require_once __DIR__ . "/../src/Robot.php";
require_once __DIR__ . "/../src/Constant.php";

use PHPUnit\Framework\TestCase;

final class PositionValTest extends TestCase
{
    public function testCanAcceptValidPositionValue()
    {
        $positionVals = [];
        $int = 0;
        while ($int < Constant::MAX_X){
            $positionVals[] = $int++;
        }
        $robot = new Robot();
        foreach ($positionVals as $val){
            $this->assertTrue($robot->validatePositionVal($val, Constant::MAX_X));
        }
    }

    public function testCanRejectInvalidPositionValue()
    {
        $positionVals = [
            '-1', Constant::MAX_X, Constant::MAX_X + 1, '1.1'
        ];
        $robot = new Robot();
        foreach ($positionVals as $val){
            $this->assertFalse($robot->validatePositionVal($val, Constant::MAX_X));
        }
    }
}