<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id', 'category_id','title','meta','short_description','description','image','image_alt','url','active'
            ];
            public function user(){
                return $this->belongsTo('App\Models\user');
            }
            public function category(){
                return $this->belongsTo('App\Models\category');
            }
            public function tags(){
                return $this->belongsToMany('App\Models\tag');
            }
            public function visitors(){
                return $this->hasMany('App/Models/visitor');
            }
}
