<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCodeMX extends Model
{
    use HasFactory;

    public function searchCode($search = null)
    {
        $result = ZipCodeMX::where('d_codigo', $search)->get();

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
