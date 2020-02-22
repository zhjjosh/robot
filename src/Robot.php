<?php
require_once __DIR__ . "/Constant.php";

class Robot
{

    private $positionX;
    private $positionY;
    private $face;

    public function __construct($positionX = 0, $positionY = 0, $face = Constant::NORTH)
    {
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->face = $face;
    }
    public function getFace()
    {
        return $this->face;
    }

    public function setFace($face)
    {
        return $this->face = $face;
    }

    public function getPositionX()
    {
        return $this->positionX;
    }

    public function setPositionX($positionX)
    {
        return $this->positionX = $positionX;
    }

    public function getPositionY()
    {
        return $this->positionY;
    }

    public function setPositionY($positionY)
    {
        return $this->positionY = $positionY;
    }

    //Display the current position of the robot
    public function report()
    {
        return $this->positionX . "," . $this->positionY . "," . $this->face;
    }

    //Place the robot to any position of the table
    public function place($placeStr)
    {
        $errors = $this->validatePlaceStr($placeStr);
        if (empty($errors)) {
            $placeStrArray = explode(",", trim($placeStr));
            $this->positionX = trim($placeStrArray[0]);
            $this->positionY = trim($placeStrArray[1]);
            $this->face = trim(strtoupper($placeStrArray[2]));
            return "Moved to " . $this->report();
        } else {
            return implode(",", $errors);
        }
    }

    public function validatePlaceStr($placeStr)
    {
        $error = [];
        $placeStrArray = explode(",", trim($placeStr));
        if (count($placeStrArray) != 3) {
            $error[] = "Invalid format of Place";
            return $error;
        }
        $positionX = trim($placeStrArray[0]);
        $positionY = trim($placeStrArray[1]);
        $face = trim(strtoupper($placeStrArray[2]));

        if (!$this->validatePositionVal($positionX, Constant::MAX_X)) {
            $error[] = "Invalid X Position";
        }

        if (!$this->validatePositionVal($positionY, Constant::MAX_Y)) {
            $error[] = "Invalid Y Position";
        }

        if (!$this->validateFaceVal($face, Constant::FACE_ENUM)) {
            $error[] = "Invalid Face Value";
        }
        return $error;
    }

    public function validatePositionVal($val, $limit)
    {
        if (is_numeric($val)) {
            $val = (int) $val;
        } else {
            return false;
        }
        return is_int($val) && $val >= 0 && $val < $limit;
    }

    public function validateFaceVal($val, $enum)
    {
        return in_array($val, $enum);
    }

    //Turn Left
    public function left()
    {
        $directions = Constant::FACE_ENUM;
        $id = array_search($this->face, $directions);
        if ($id) {
            $this->face = $directions[--$id];
        } else {
            $this->face = end($directions);
        }
        return "Facing " . $this->face . " Now";
    }

    //Turn Right
    public function right()
    {
        $directions = Constant::FACE_ENUM;
        $id = array_search($this->face, $directions);
        if ($id == (count($directions) - 1)) {
            $this->face = $directions[0];
        } else {
            $this->face = $directions[++$id];
        }
        return "Facing " . $this->face . " Now";
    }

    //Move forward by one position
    public function move()
    {
        if ($this->validateMove()) {
            switch ($this->face) {
                case Constant::NORTH :
                    $this->positionY++;
                    break;
                case Constant::EAST :
                    $this->positionX++;
                    break;
                case Constant::SOUTH :
                    $this->positionY--;
                    break;
                case Constant::WEST :
                    $this->positionX--;
                    break;
                default:
                    break;
            }
            return "Moved to " . $this->report();
        } else {
            return "Cannot Move with the position " . $this->report();
        }
    }

    public function validateMove()
    {
        if ($this->positionX == (Constant::MAX_X - 1) && $this->face == Constant::EAST) {
            return false;
        }
        if ($this->positionX == 0 && $this->face == Constant::WEST) {
            return false;
        }
        if ($this->positionY == (Constant::MAX_Y - 1) && $this->face == Constant::NORTH) {
            return false;
        }
        if ($this->positionY == 0 && $this->face == Constant::SOUTH) {
            return false;
        }
        return true;
    }
}
