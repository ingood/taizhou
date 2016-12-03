<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [
        'id',
    ];

    public function setYjqssjAttribute($datetime)
    {
        if(empty($datetime)) {
            $this->attributes['yjqssj'] = null;
        }
    }

    public function setYjwcsjAttribute($datetime)
    {
        if(empty($datetime)) {
            $this->attributes['yjwcsj'] = null;
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
