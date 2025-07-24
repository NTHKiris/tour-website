<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    /** @use HasFactory<\Database\Factories\DestinationFactory> */
    use HasFactory;
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
}
