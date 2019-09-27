<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $table = 'make';

    protected $fillable = ['name','country_id','logo'];

    public function country(){
        return $this->hasOne('App\Country', 'id', 'country_id');
    }
}
