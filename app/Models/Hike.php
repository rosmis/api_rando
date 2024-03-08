<?php

namespace App\Models;

use App\Builders\HikeBuilder;
use App\Traits\GpsConversionTrait;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

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
 * @property float latitude
 * @property float longitude
 * @property string ign_reference
 * @property string hike_url
 * @property string gpx_url
 * @property bool is_return_starting_point
 * @property Carbon created_at
 * @property Carbon updated_at
 * 
 * Relations
 * @property Collection<int,Hike> $images
 * 
 * - Support
 *
 * @method static HikeBuilder query()
 * @method static HikeBuilder newQuery()
 */

class Hike extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_return_starting_point' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(HikeImage::class);
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  QueryBuilder  $query
     */
    public function newEloquentBuilder($query): HikeBuilder
    {
        return new HikeBuilder($query);
    }
}
