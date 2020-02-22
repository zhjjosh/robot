<?php
require_once __DIR__ . "/../src/Robot.php";

use PHPUnit\Framework\TestCase;

final class PlaceTest extends TestCase
{
    public function testCanAcceptValidPlaceStrValue()
    {
        $placeStrings = [
            "1,1,SOUTH",
            "0,3,North ",
            " 1, 2 ,WeSt ",
        ];
        $robot = new Robot();
        foreach ($placeStrings as $str){
            $this->assertSame($robot->validatePlaceStr($str), []);
        }
    }

    public function testCanRejectInvalidPlaceStrValue()
    {
        $placeStrings = [
            'askdhkajsh',
            "-1,1,SOUTH",
            "0,-1,North ",
            " 1, 2 ,sdkasdl ",
            "-1,-1,SOUTH",
            "-1,1,SOUasdTH",
            "1,-1,asdkjsa",
            "-1,-1,asdkhsadjksahd",
        ];
        $robot = new Robot();
        
        $this->assertSame($robot->validatePlaceStr($placeStrings[0]), ["Invalid format of Place"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[1]), ["Invalid X Position"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[2]), ["Invalid Y Position"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[3]), ["Invalid Face Value"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[4]), ["Invalid X Position", "Invalid Y Position"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[5]), ["Invalid X Position", "Invalid Face Value"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[6]), ["Invalid Y Position", "Invalid Face Value"]);
        $this->assertSame($robot->validatePlaceStr($placeStrings[7]), ["Invalid X Position", "Invalid Y Position", "Invalid Face Value"]);
    }
}