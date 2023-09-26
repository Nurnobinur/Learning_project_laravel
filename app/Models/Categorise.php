<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorise extends Model
{

    use HasFactory;
    protected $guarded=["id"];
    public function course(){
        return $this->hasMany(Course::class,"id","category_id");
    }
}
