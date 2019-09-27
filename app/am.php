<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class am extends Authenticatable
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

    protected $table = 'amphures';

    protected $fillable = [
'code', 'name_th','name_en','province_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  

}
