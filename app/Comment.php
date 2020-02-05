<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['okr_id','fullname','objective','comment'];
    
    public $primaryKey = 'id';
    
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
