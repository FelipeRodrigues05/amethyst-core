<?php

namespace App\Enums;

enum UserProfileEnum: string
{
    case DEFAULT = 'default';
    case ADMIN = 'admin';
    case DEVELOPER = 'developer';
}
