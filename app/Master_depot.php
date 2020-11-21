<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_depot extends Model
{
    //

    protected $fillable = ['id', 'depot_code', 'depot_name','add1','add1','add2','add3','country','state_code','district','city','pincode','contac_person','contac_email'];
}
