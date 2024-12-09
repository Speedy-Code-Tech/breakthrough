<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table = 'sports';
    protected $fillable = ['user_id','name','description','image_path','status'];
}
