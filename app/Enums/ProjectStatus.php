<?php

namespace App\Enums;

enum ProjectStatus: int
{
    case ALL = 0;
    case ACTIVE = 1;
    case CLOSED = 5;
    case ARCHIVED = 9;

    public function string(): string
    {
        return match($this){
            ProjectStatus::ALL => __('ALL'),
            ProjectStatus::ACTIVE => __('ACTIVE'),
            ProjectStatus::CLOSED => __('CLOSED'),
            ProjectStatus::ARCHIVED => __('ARCHIVED'),
        };
    }
}