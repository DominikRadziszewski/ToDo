<?php

namespace App\Enums;

class TaskStatus
{
    const Done = 'Done';
    const In_Progrss = 'In Progress';
    const None= 'Not Started'; 
    const TYPES = [
        self::Done,
        self::In_Progrss,
        self::None,
    ];
}