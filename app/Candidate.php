<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $table = 'candidates';
    
    public function users(){
        return $this->hasMany("App\User");
    }
}
