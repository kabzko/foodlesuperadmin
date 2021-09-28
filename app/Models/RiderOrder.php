<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiderOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'rider_id', 'status_id'
    ];   
}
