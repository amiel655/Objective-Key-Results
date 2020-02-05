<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OKR extends Model
{
    protected $table = 'okr';
    protected $fillable = ['user_id','name','objective','description', 'date_recieved',
     'date_due', 'man_hours','status'];
    
    public $primaryKey = 'okr_id';
    
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
