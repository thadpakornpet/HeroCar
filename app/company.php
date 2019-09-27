<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'type_business', 'name_business_th', 'name_business_eng', 'address_company', 'vat','size', 'phone_office', 'phone','website'
    ];
    //
}
