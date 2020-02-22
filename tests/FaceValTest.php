<?php
require_once __DIR__ . "/../src/Robot.php";
require_once __DIR__ . "/../src/Constant.php";

use PHPUnit\Framework\TestCase;

final class FaceValTest extends TestCase
{
    public function testCanAcceptValidFaceValue()
    {
        $faces = Constant::FACE_ENUM;
        $robot = new Robot();
        foreach ($faces as $face){
            $this->assertTrue($robot->validateFaceVal($face, $faces));
        }
    }

    public function testCanRejectInvalidFaceValue()
    {
        $faces = [
            'asdsad', 'south east', '19248'
        ];
        $robot = new Robot();
        foreach ($faces as $face){
            $this->assertFalse($robot->validateFaceVal($face, Constant::FACE_ENUM));
        }
    }
}