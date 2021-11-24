<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cms extends Model
{
    use HasFactory;

    protected $fillable = [
   
   'about_heading','about_description','about_short_description','contect_heading','contect_description','contect_short_description','twitter','facebook','instagram','section_name'
 
    ];
}
