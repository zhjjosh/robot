<?php
require_once __DIR__ . "/Constant.php";
require_once __DIR__ . "/Robot.php";

class AppController
{

    private $robot;

    public function __construct()
    {
        $this->robot = new Robot();
    }

    function runApplication()
    {
        $f = fopen('php://stdin', 'r');
        $command = "";
        while ($command != Constant::EXIT) {
            echo "Please Enter: ";
            $command = strtoupper(trim(fgets($f)));
            if (substr($command, 0, 6) == Constant::PLACE.' '){
                $arg = substr($command, 6);
                $command = Constant::PLACE;
            };
            switch ($command) {
                case Constant::EXIT :
                    fclose($f);
                    break;
                case Constant::LEFT :
                    echo $this->robot->left()."\n";
                    break;
                case Constant::RIGHT :
                    echo $this->robot->right()."\n";
                    break;
                case Constant::PLACE :
                    echo $this->robot->place($arg)."\n";
                    break;
                case Constant::REPORT :
                    echo $this->robot->report()."\n";
                    break;
                case Constant::MOVE :
                    echo $this->robot->move()."\n";
                    break;
                case Constant::HELP :
                    echo $this->help()."\n";
                    break;
                default:
                    echo "Wrong Command, Please see below help\n";
                    echo $this->help()."\n";
                break;
            }
        }
    }

    //Show the help menu
    public function help()
    {
        return "The following command are valid, command are case insensitive: 
        LEFT - Turn Left
        RIGHT - Turn Right
        PLACE - Place the robot to any position of the table
        MOVE - Move forward by one position
        REPORT - Display the current position of the robot
        HELP - Show the help menu
        EXIT - Exit the application\n";
    }
}
