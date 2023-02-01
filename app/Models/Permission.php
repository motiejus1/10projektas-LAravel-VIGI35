<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as OriginalPermissionModelFromSpatie;
use App\Models\Allowedmethod;

// 2 failai
//Class Permission 
//Class Permission

//1. Jos yra skirtinguose aplankuose
//2. atliekami skirtini funkcionalumia

// 
//tokia klase yra jau deklaruota
//klase pasivadinti kaip noriu nekeiciant jos originalaus pavadinimas

//VIENA SU KITA EXTENDINU
//prie originalios klases prilipdau savo klase ir prapleciu funkcionaluma

class Permission extends OriginalPermissionModelFromSpatie
{
    use HasFactory;

    public function permissionsAllowedmethods() {
        return $this->belongsToMany(Allowedmethod::class, 'allowedmethods_permissions');
    }
}
