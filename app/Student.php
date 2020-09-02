<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='studentregistration';
    protected $fillable=['name','email','image','password'];
}

?>