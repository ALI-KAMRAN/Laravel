<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    use HasFactory;

    protected $fillable = [
'blog_id','ip',
    ];

    // many visitors belongs to one blog
    public function blogs(){
        return $this->belongsTo('App/Models/blog');
    }
}
