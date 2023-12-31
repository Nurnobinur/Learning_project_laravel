<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded=["id"];
    use HasFactory;
    public function category(){
       return $this->belongsTo(Categorise::class,"category_id","id");
    }
}
