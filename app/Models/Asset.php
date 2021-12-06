<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssetManagement;
use App\Models\Category;

class Asset extends Model
{
    use HasFactory;

        public function category(){
        return $this->hasOne(Category::class,'id', 'category_id');
    }

        public function assetManagement(){
        return $this->hasOne(AssetManagement::class);
    } 

      // public function assets(){
    //     return $this->belongsTo(Assets::class);
    // }

}
