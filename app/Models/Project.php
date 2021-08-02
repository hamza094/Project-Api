<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function owner()
    {
       return $this->belongsTo(User::class,'owner_id');
    }

    public function category()
    {
    	return $this->hasMany(Category::class);
    }
}
