<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChucVu extends Model
{
    use HasFactory;

    public function getList() {
        $list = DB::table('chuc_vus')->get();
        return $list;
    }

    public function createChucVu($data)  {
        DB::table('chuc_vus')->insert($data);
    }
}
