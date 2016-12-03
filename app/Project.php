<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [
        'id',
    ];

    public function setYjqssjAttribute($date)
    {
        var_dump($date);
        if(empty($date)) {
            $this->attributes['yjqssj'] = null;
        } else {
            $this->attributes['yjqssj'] = $date;
        }
    }

    public function setYjwcsjAttribute($date)
    {
        var_dump($date);
        if(empty($date)) {
            $this->attributes['yjwcsj'] = null;
        } else {
            $this->attributes['yjwcsj'] = $date;
        }
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
