<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset;
use App\Models\AssetManagement;

class Category extends Model
{
    use HasFactory;

    public function asset(){
        return $this->belongsTo(Asset::class);
    } 
 
       public function assetManagement(){
        return $this->hasOne(AssetManagement::class);
    } 
}
