<?php

namespace Pit\BigQuery\Model;

class Demo extends Bseg
{
    
    public function subtotal($params){

    }

    public function breakdown($params){

       $sql = " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, HKONT AS account, KOSTL AS ceco ".
        " FROM ". 
        " (SELECT BUDAT, DMBTR, HKONT, KOSTL,  FROM `informe-211921.BALANZA.BSEGAIO`".
        " WHERE CAST(SUBSTR(BUDAT,5,2) AS INT64) = ".$params['month'].
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = '".$params['BANCO']."')".
        " AND HKONT = '".$params['account']."');";
        $breakdown = $this->bigQueryLib->select($sql);
        return $breakdown;

    }
    
    public function ammount($params){



    }

}

