<?php

class Demo extends Connection{

    public function __construct($bigQueryLib){

        $this->attach($bigQueryLib);

    }

    public function breakdown($params){

        $sql=
        " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, ".$params['enterprise']." AS enterprise ".
        " FROM ".
        " (SELECT BUDAT,DMBTR FROM `informe-211921.MULTIVA.BSEGAIO`".
        " WHERE CAST(SUBSTR(BUDAT,5,2) AS INT64) = 1".
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = 2019".
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')".
        " AND HKONT = '6410010102');";

        echo($sql);

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }
    
}






?>