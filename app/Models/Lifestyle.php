<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lifestyle extends Model
{
    
    protected $table = 'lifestyles';
    protected $fillable = ['user_id','name','description','image_path','status'];
}
