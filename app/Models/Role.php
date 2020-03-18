<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Пользователи, принадлежащие этой роли.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
