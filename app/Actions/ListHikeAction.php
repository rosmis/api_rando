<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Hike;

class ListHikeAction
{
    public function __invoke(int $id): Hike
    {
        return Hike::query()
            ->findOrFail($id);
    }
}