<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCodeMX;

class ZipCodesController extends Controller
{
    public function get($cp = null)
    {

       $result = $this->structure(ZipCodeMX::searchCode($cp));

       if(empty($result))
       {
            return response()->json($result, 404);
       }

       return response()->json($result, 200);
    }

    private function structure($result = null)
    {
        if(empty($result[0]->d_codigo))
        {
            return null;
        }
        
        $data['zip_code'] = $result[0]->d_codigo;
        $data['locality'] = strtoupper($result[0]->d_ciudad);
        $data['federal_entity'] = array(
            'key'   => $result[0]->c_estado,
            'name'  => strtoupper($result[0]->d_estado),
            'code'  => null
        );
        $data['settlements'] = array();

        foreach ($result as $key => $value) {

            $settlements = array(
                'key'           => $value->c_mnpio,
                'name'          => strtoupper($value->d_asenta),
                'zone_type'     => strtoupper($value->id_asenta_cpcons),
                'settlement_type' => array(
                    'name' => strtoupper($value->d_tipo_asenta),
                ),
            );
            array_push($data['settlements'],$settlements);
        }

        return $data;
    }
    
}
