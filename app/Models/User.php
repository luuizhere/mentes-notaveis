<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name','address_id'];

    public function address(){
        return $this->belongsTo(Address::class,'address_id','id');
        // return $this->hasMany(Address::class);
    }

}
