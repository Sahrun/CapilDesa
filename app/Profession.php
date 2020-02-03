<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table="profession";

    protected $fillable=[
        "name",
        "is_active",
        "description",
        "created_by",
        "modified_by"
    ];

    // public function FunctionName(Type $var = null)
    // {
    //     return $this->belongsTo('App\relasiname');
    // }
}
