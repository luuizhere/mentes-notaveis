<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = ['updated_at','created_at'];

    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
