<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADMIN()
 * @method static static USER()
 */
final class UserRole extends Enum
{
    const ADMIN = 0;
    const USER = 1;
}
