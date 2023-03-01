<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCovers extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user(){
        return $this->hasMany(User::class,'covers_id');
    }
    public function payments(){
        return $this->hasMany(Payments::class,'covers_id');
    }
}
