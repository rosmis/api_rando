<?php

namespace App\Console\Commands;

use App\Enum\HikeDifficulty;
use App\Models\Hike;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ConvertHikeDifficultyToEnum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-hike-difficulty-to-enum';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Hike::query()
            ->get()
            ->each(function (Hike $hike) {
                $hikeEnumCorrespondance = Collection::make(HikeDifficulty::cases())
                    ->filter(fn ($value, $key) => $value->title() === $hike->difficulty)
                    ->first()
                    ->value;

                $hike->difficulty = $hikeEnumCorrespondance;
                $hike->save();
            });

        $this->info('Hike difficulty converted to enum successfully');
    }
}
