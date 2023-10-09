<?php

namespace App\Modules\Category\Enums;

enum FillableKey: string
{
    case NAME = 'name';
    case DESCRIPTION = 'description';
    case CREATEDDATE = 'createdDate';
    case ACTIVE = 'active';
    case MINUS_NAME = '-name';
    case MINUS_DESCRIPTION = '-description';
    case MINUS_CREATEDDATE = '-createdDate';
    case MINUS_ACTIVE = '-active';
}
