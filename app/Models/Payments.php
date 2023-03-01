<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function insuaranceCover(){
        return $this->belongsTo(InsuranceCovers::class,'covers_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
