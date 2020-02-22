<?php

class Constant{

    //Robot
    const MAX_X = 5;
    const MAX_Y = 5;
    const NORTH = 'NORTH';
    const EAST = 'EAST';
    const SOUTH = 'SOUTH';
    const WEST = 'WEST';
    const FACE_ENUM = [
        self::NORTH,
        self::EAST,
        self::SOUTH,
        self::WEST
    ];

    //Actions
    const LEFT = 'LEFT';
    const RIGHT = 'RIGHT';
    const PLACE = 'PLACE';
    const REPORT = 'REPORT';
    const HELP = 'HELP';
    const MOVE = 'MOVE';
    const EXIT = 'EXIT';
    const ACTIONS = [
        self::LEFT,
        self::RIGHT,
        self::PLACE,
        self::REPORT,
        self::HELP,
        self::MOVE,
        self::EXIT
    ];
}