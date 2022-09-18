<?php

namespace App\Enums;

enum UserStatus: int
{
    case ALL = 0;
    case ACTIVE = 1;
    case REGISTERD = 2;
    case LOCKED = 3;

    public function string(): string
    {
        return match($this){
            UserStatus::ALL => __('ALL'),
            UserStatus::ACTIVE => __('ACTIVE'),
            UserStatus::REGISTERD => __('REGISTERD'),
            UserStatus::LOCKED => __('LOCKED'),
        };
    }
}