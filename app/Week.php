<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $table = 'weeks';
    protected $fillable = ['user_id','status','weeknum', 'year'];
    
    public $primaryKey = 'id';
    
    public $timestamps = true;
}
