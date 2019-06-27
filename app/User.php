<?php

namespace Corp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function articles(){
        
        return $this->hasMany('Corp\Article');
    }

    public function roles(){

        return $this->belongsToMany('Corp\Role','role_user');
    }

    public function canDo($permission, $require = FALSE){
        
        if (is_array($permission)) {
            
            foreach ($permission as $permName) {
                  
                  $permName = $this->canDo($permName);
                //Если один правил из массива будет совпадат
                  if ($permName && !$require) {
                        return TRUE; 
                   }
                // Если ни один из правил нету          
                   elseif (!$permName && $require) {
                       return FALSE;
                   }
            }    

            return $require;

        }else{
            foreach ($this->roles as $role) {
                 foreach ($role->perms as $perm) {
                     if (str_is($permission,$perm->name)) {
                         return TRUE;
                     }
                 }
             }
        } 
        
    }

    public function hasRole($name, $require = FALSE){

            if (is_array($name)) {
                foreach ($name as $roleName) {
                    
                    $hasRole = $this->hasRole($roleName);

                    if ($hasRole && !$require) {
                        return TRUE;
                    } elseif (!$hasRole && $require) {
                        return FALSE;
                    }
                }

                return $require;
            }
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
