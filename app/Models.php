<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'model';

    protected $fillable = ['name','bodytype','makeid'];

    public function body(){
        return $this->hasOne('App\Bodytype', 'id', 'bodytype');
    }

    public function make(){
        return $this->hasOne('App\Make', 'id', 'makeid');
    }
}
