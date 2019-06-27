<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    public function users(){

        return $this->belongsToMany('Corp\User','role_user');
    }

    public function perms(){

        return $this->belongsToMany('Corp\Permission','permission_role');
    }

    public function hasPermission($name, $require = FALSE){

            if (is_array($name)) {
                foreach ($name as $permissionName) {
                    
                    $hasPermission = $this->hasPermissions($permissionName);

                    if ($permissionName && !$require) {
                        return TRUE;
                    } elseif (!$permissionName && $require) {
                        return FALSE;
                    }
                }

                return $require;
            }else{

            	foreach ($this->perms as $permission) {
            		if ($permission->name == $name) {
            			return TRUE;
            		}
            	}
            }

           return FALSE; 
    }

    public function savePermissions($inputPerms)
    {
        if (!empty($inputPerms)) 
        {
            $this->perms()->sync($inputPerms);
        }else{
            $this->perms()->detach();
        }

        return TRUE;
        
    }



}
