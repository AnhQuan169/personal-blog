<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADMIN()
 * @method static static USER()
 */
final class UserRole extends Enum
{
    const ADMIN = 1;
    const USER = 2;
}
