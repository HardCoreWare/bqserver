<?php

class Demo extends BigQueryConnection implements BsegInterface{

    public function __construct($bigQueryLib){

        $this->attach($bigQueryLib);

    }
    
    public function breakdown($params){

        $sql = 
        " SELECT HKONT AS account, BUDAT AS ".
        " FROM ".
        " (SELECT BUDAT,DMBTR,HKONT FROM `informe-211921.MULTIVA.BSEGAIO` ".
        " WHERE CAST(SUBSTR(BUDAT,5,2) AS INT64) = 1 ".
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = 2019 ".
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'OPERADORA')".
        " AND HKONT = '6410010103'); ";

       $breakdown=$this->bigQueryLib->select($sql);

       return $breakdown;

    }
    
    public function ammount($params){

    }

    public function subtotal($params){

    }

}

