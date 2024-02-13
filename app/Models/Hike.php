<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Attributes
 * 
 * @property string title
 * @property string excerpt
 * @property string description
 * @property string activity_type
 * @property string difficulty
 * @property int distance
 * @property string duration
 * @property int positive_elevation
 * @property int negative_elevation
 * @property string municipality
 * @property int highest_point
 * @property int lowest_point
 * @property string location
 * @property string ign_reference
 * @property string hike_url
 * @property bool is_return_starting_point
 * @property Carbon created_at
 * @property Carbon updated_at
 * 
 * Relations
 * @property Collection<int,Hike> $images
 */

class Hike extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images(): HasMany
    {
        return $this->hasMany(HikeImage::class);
    }
}
