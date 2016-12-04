<?php
namespace App;
use Baum\Node;

class Corporation extends Node {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name'
    ];

}
