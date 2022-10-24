<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BLOCK()
 * @method static static ACTIVE()
 * @method static static PROCESSING()
 */
final class UserStatus extends Enum
{
    const BLOCK = 0;
    const ACTIVE = 1;
    const PROCESSING = 2;
}
