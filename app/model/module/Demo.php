<?php

class Demo extends Connection{

    public function __construct($bigQueryLib){

        $this->attach($bigQueryLib);

    }

    public function breakdown($params){

        $sql="SELECT ROUND(SUM(CAST(DMBTR AS FLOAT64)), 2) AS MONTO
        FROM 
        (SELECT BUDAT,DMBTR FROM `informe-211921.BALANZA.BSEG_2019_1`
        WHERE CAST(SUBSTR(BUDAT,5,2) AS INT64) = 1
        AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = 2019
        AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')
        AND DMBTR = 'N0212019001'
        AND HKONT = '6410010102');";

        $breakdown = $this->bigQueryLib->select($sql);

    }
    
}






?>