<?php

namespace App\Enums;

enum PostStatusEnum: string
{
    case Published = 'published';
    case Draft = 'draft';

    public static function toArray()
    {
        return array_column(PostStatusEnum::cases(), 'value');
    }
}
