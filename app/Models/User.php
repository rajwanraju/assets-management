<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Assets;
use App\Models\Category;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     public function assetManagement(){
        return $this->hasMany(AssetManagement::class,'user_id', 'id');
    } 

  public function scopeNotRole(Builder $query, $roles, $guard = null)
  {
       if ($roles instanceof Collection) {
           $roles = $roles->all();
       }

       if (! is_array($roles)) {
           $roles = [$roles];
       }

       $roles = array_map(function ($role) use ($guard) {
           if ($role instanceof Role) {
               return $role;
           }

           $method = is_numeric($role) ? 'findById' : 'findByName';
           $guard = $guard ?: $this->getDefaultGuardName();

           return $this->getRoleClass()->{$method}($role, $guard);
       }, $roles);

       return $query->whereHas('roles', function ($query) use ($roles) {
           $query->where(function ($query) use ($roles) {
               foreach ($roles as $role) {
                   $query->where(config('permission.table_names.roles').'.id', '!=' , $role->id);
               }
           });
       });
  }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
