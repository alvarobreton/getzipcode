<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCodeMX extends Model
{
    use HasFactory;

    public function searchCode($search = null)
    {
        return $result = ZipCodeMX::where('d_codigo', $search)->get();
    }
}
