<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
class Artical extends Model
{
    use HasFactory;

    public function getCategory()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }


    public function getTags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
