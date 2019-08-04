<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'name',
        'category',
        'detail'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function company() {
        return $this->hasOne('App\Companies', 'id', 'company_id');
    }
}
