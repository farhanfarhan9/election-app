<?php

namespace App\Models;

use App\Models\Election;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function election(){
        return $this->belongsTo(Election::class,'election_id', 'id');
    }
}
