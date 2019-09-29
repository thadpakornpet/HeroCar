<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $table = 'soldcar';

    protected $fillable = ['id','makeid','modelid','licenseno','countryid','bodyid','tranmisstionid','drivetypeid','enginetypeid','fueltype','colorid','year','miles','price','soldnote','userid','status'];

    public function getNameMake(){
        return $this->hasOne('App\Make', 'id','makeid');
    }

    public function getNameModel(){
        return $this->hasOne('App\Models','id','modelid');
    }

    public function getNameBodyType(){
        return $this->hasOne('App\Bodytype','id','bodyid');
    }

    public function getNameCountry(){
        return $this->hasOne('App\Country','id','countryid');
    }

    public function getNameEngine(){
        return $this->hasOne('App\Engine','id','enginetypeid');
    }

    public function getNameColor(){
        return $this->hasOne('App\Color','id','colorid');
    }

    public function getNameFuel(){
        return $this->hasOne('App\Fuel','id','fueltype');
    }

    public function getNameTran(){
        return $this->hasOne('App\Transmission','id','tranmisstionid');
    }

    public function getNameDrive(){
        return $this->hasOne('App\Drive','id','drivetypeid');
    }

}
