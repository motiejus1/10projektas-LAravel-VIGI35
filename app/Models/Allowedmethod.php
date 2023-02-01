<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Permission modelis
//Permission modelis neegzistuoja

class Allowedmethod extends Model
{
    use HasFactory;

    public function allowedmethodsPermissions() {
        return $this->belongsToMany(Permission::class, 'allowedmethods_permissions');
    }
}
