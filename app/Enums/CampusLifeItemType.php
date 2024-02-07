<?php

namespace App\Enums;

enum CampusLifeItemType: string
{
    case General = 'General';
    case Activity = 'Activity';
    case Facility = 'Facility';

    public static function toArray()
    {
        return array_column(self::cases(), 'value');
    }
}
