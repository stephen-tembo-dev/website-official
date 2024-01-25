<?php

namespace App\Enums;

enum EventStatusEnum: string
{
    case Published = 'published';
    case Draft = 'draft';

    public static function toArray()
    {
        return array_column(EventStatusEnum::cases(), 'value');
    }
}
