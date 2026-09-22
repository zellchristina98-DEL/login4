<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class database extends Model
{
    public function pull($perpus, $z){
    return DB::table($perpus)->where($z)->first();
    }
       protected $table = 'users';
      protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
