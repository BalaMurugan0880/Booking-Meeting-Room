<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
   

     protected $fillable = [
        'user_id','name', 'location', 'person', 'date', 'hours','time','table',
    ];

     public function User()
    {
         return $this->hasMany('App\Models\User', 'user_id' , 'id');
    }
}
