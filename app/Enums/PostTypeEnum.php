<?php

namespace App\Enums;

enum PostTypeEnum: string
{
    case News = 'news';
    case Announcement = 'announcement';

    public static function toArray()
    {
        return array_column(PostTypeEnum::cases(), 'value');
    }
}
