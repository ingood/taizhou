<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [
        'id',
    ];

    public function awards()
    {
        return $this->hasMany('App\Award');
    }

    public function setYjqssjAttribute($date)
    {
        $this->attributes['yjqssj'] = empty($date) ? null : $date;
    }

    public function setYjwcsjAttribute($date)
    {
        $this->attributes['yjwcsj'] = empty($date) ? null : $date;
    }

    public function setRwlyAttribute($data)
    {
        if(is_array($data)) {
            $this->attributes['rwly'] = join($data, ',');
        }
    }

    public function getRwlyAttribute($data)
    {
        return explode(',', $data);
    }

    public function setSsgmjjhyAttribute($data)
    {
        if(is_array($data)) {
            $this->attributes['ssgmjjhy'] = join($data, ',');
        }
    }

    public function getSsgmjjhyAttribute($data)
    {
        return explode(',', $data);
    }
}
