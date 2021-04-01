<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
   

     protected $fillable = [
        'user_id','name', 'location', 'date', 'hours'];

     public function User()
    {
         return $this->hasMany('App\Models\User', 'user_id' , 'id');
    }
}
