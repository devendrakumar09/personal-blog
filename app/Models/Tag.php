<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artical;
class Tag extends Model
{
    use HasFactory;

    public function getArticals()
    {
        return $this->belongsToMany(Artical::class);
    }
}
