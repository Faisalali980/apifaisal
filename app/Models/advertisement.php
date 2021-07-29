<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertisement extends Model
{
   // disable timestamps at create and update
   public $timestamps = false;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'username',
       'adtype',
       'title',
       'description',
       'audience',
       'agemin',
       'agemax',
       'country',
       'city',

   ];
}
