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

    public function tampil($table)
    {
        return DB::table($table)
        ->get();
    }

    protected $table='users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

public function tampilFilter($table, $tgl_awal, $tgl_akhir)
{
    return DB::table($table)
        ->whereBetween('created_at', [
            $tgl_awal . ' 00:00:00',
            $tgl_akhir . ' 23:59:59'
        ])->get();
}
}