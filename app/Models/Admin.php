<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    protected $fillable = ['name', 'password', 'email', 'role'];

    // 
    public function isAdmin (){
        return $this->role === 'Admin';
    }

    // 
    public function isSuperAdmin() {
        return $this->role === 'SuperAdmin';
    }
}
