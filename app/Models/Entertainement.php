<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entertainement extends Model
{
    protected $table = 'entertainements';
    protected $fillable = ['user_id','name','description','image_path','status'];
}
