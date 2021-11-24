<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $table='tags';
    protected $fillable = [
'name','slug'
    ];

    public function blogs(){
        return $this->belongsToMany('App\Models\blog');
    }
}
