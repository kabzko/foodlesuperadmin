<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'name', 'streets', 'preparing_time', 'delivery_type', 'latitude', 'longitude', 'close_day', 'open_time_a', 'open_time_b', 'tin', 'storebanner', 'orderbanner', 'storethumbnail', 'status_id'
    ];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
