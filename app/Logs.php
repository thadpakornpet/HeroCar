<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Logs extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * 
     * 
     *
     * @var array
     */

    protected $table = 'logs';

    protected $fillable = ['userid','remark','ipaddress','agent','created_at','updated_at'];
    
    public  function user(){
		return $this->hasOne('App\User','id','userid');
    }
    public  function agen(){
		return $this->hasOne('App\User','id','agent');
	}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
