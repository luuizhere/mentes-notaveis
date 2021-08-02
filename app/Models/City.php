<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = ['updated_at','created_at'];

    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }

    
}
