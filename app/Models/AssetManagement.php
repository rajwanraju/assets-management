<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assets;
use App\Models\Category;
use App\Models\User;

class AssetManagement extends Model
{
    use HasFactory;

    public function assets(){
        return $this->belongsTo(Assets::class);
    } 


     public function category(){
        return $this->belongsTo(Category::class);
    }


     public function user(){
        return $this->belongsTo(User::class);
    }
}
