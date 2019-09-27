<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model {

    protected $table = 'emails';
    protected $fillable = ['userid', 'fromemail', 'toemail', 'title', 'attachment', 'remark'];
    
    public function users(){
        return $this->hasOne('App\User','id','userid');
    }
}
