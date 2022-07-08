<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCodeMX;

class ZipCodesController extends Controller
{
    public function get($cp = null)
    {

       $result = ZipCodeMX::searchCode($cp);

       if(empty($result))
       {
            return response()->json($result, 404);
       }

       return response()->json($result, 200);
    }
    
}
