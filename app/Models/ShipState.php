<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipState extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function division(){
        return $this->belongsTo('App\Models\ShipDivision','division_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\ShipDistrict','district_id');
    }
}
