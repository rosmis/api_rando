<?php

namespace App\Console\Commands;

use App\Models\Hike;
use Illuminate\Console\Command;

class MigrateLocationColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-location-column';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hikes = Hike::query()
            ->get()
            ->each(function ($hike) {
                $hike->latitude = $hike->location['latitude'];
                $hike->longitude = $hike->location['longitude'];

                $hike->save();
            });

        $this->info('Location column migrated successfully');
    }
}
