<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function jobs() {
        return $this->hasMany('App\Jobs', 'company_id', 'id');
    }
}
