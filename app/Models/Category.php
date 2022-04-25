<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artical;
class Category extends Model
{
    use HasFactory;

    
    public function getArticals()
    {
        return $this->hasMany(Artical::class,'cat_id');
    }
}
