<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    protected $table = 'announcements';
    protected $fillable = ['user_id','name','description','image_path','status'];
}
