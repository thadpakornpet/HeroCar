<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'id', 'phone1', 'phone2', 'address1', 'road1', 'subdistrict1', 'district1', 'province1', 'zipcode1', 'address2', 'road2', 'subdistrict2', 'district2', 'province2', 'zipcode2', 'country'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
