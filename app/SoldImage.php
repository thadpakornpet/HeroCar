<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldImage extends Model
{
    protected $table = 'soldimage';

    protected $fillable =['soldid','image'];
}
