<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CommentStatus extends Enum
{
    const Published = 'published';
    const Edited = 'edited';
    const Deleted = 'deleted';

}
