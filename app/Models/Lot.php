<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lot extends Model
{
    use HasFactory, Sluggable;

    protected $dates = [
        'dt_end',
    ];

    protected $fillable = [
        'name', 
        'description', 
        'category_id', 
        'img', 
        'price', 
        'step', 
        'dt_end', 
        'user_id', 
    ];

    /**
     * Get bidding price of lot
     *
     * @return int
     */
    public function getBidPrice(): int
    {
        // if ($this->bids->last()) {
        //     $lastPrice = $this->bids->last()->price + $this->step;
        // }

        $lastPrice = $this->getCurrentPrice() + $this->step;
        $priceToBid = $this->price + $this->step;
        return $lastPrice ?? $priceToBid;
    }

    /**
     * Get lot's price (or last bidded if exists)
     *
     * @return int
     */
    public function getCurrentPrice(): int
    {
        return $this->bids->last()->price ?? $this->price;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}