<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'religions';
    protected $primaryKey ='id';
    Protected $fillable = [
                        "id", 
                        "name", 
                        "is_active",
                        "description",
                        "created_by", 
                        "modified_by", 
                        "created_at", 
                        "updated_at"
                        ];
    protected $timestam = true;
}
