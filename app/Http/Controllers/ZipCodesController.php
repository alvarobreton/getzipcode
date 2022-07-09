<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCodeMX;


class ZipCodesController extends Controller
{
    private $code;

    public function __construct()
    {
        $this->code = 404;
    }

    public function get($cp = null)
    {
        $ZipCodeMX = new ZipCodeMX;
        $result = $this->structure($ZipCodeMX->searchCode($cp));

        if(!empty($result))
        {
                $this->code = 200;
        }

        return response()->json($result, $this->code);
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
