<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PostStatus extends Enum
{
    const Unactive = 1;
    const Active = 2;
    const Processing = 3;
}
