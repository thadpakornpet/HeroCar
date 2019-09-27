<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['name', 'description', 'task_date', 'userid'];
    //

    public function users(){
      return $this->hasOne('App\User', 'id', 'userid');
    }
}
