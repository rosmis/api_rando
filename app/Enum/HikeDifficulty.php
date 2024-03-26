<?php

declare(strict_types=1);

namespace App\Enum;

enum HikeDifficulty: string
{
    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';

    public function title(): string
    {
        return match ($this) {
            self::EASY => 'Facile',
            self::MEDIUM => 'Moyenne',
            self::HARD => 'Difficile',
        };
    }
}
