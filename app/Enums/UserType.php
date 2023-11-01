<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


/**
 * @method static static Listener()
 * @method static static Curator()
 */
final class UserType extends Enum
{
    const Listener = 'listener';
    const Curator = 'curator';
}
