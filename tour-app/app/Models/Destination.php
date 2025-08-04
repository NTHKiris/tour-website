<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    /** @use HasFactory<\Database\Factories\DestinationFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'coordinates',
        'featured_image',
    ];
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
