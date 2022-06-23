<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Role extends Enum implements LocalizedEnum
{
    const SUBSCRIBER = 'subscriber';
    const CONTRIBUTOR = 'contributor';
    const AUTHOR = 'author';
    const EDITOR = 'editor';
    const ADMINISTRATOR = 'administrator';
}
