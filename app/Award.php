<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = empty($date) ? null : Carbon::createFromDate($date);
    }

    public function getDateAttribute($date)
    {
        return date("Y",strtotime($date));
    }
}
