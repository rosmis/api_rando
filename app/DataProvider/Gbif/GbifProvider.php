<?php

declare(strict_types=1);

namespace App\DataProvider\Gbif;

use Illuminate\Support\Collection;

interface GbifProvider
{
    public function getSpecies(string $localisation): Collection;

    public function getSpecieById(int $id): Collection;
}