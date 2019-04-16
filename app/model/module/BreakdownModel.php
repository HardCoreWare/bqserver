<?php

class BreakdownModel extends Connection{

    public function __construct($bigQueryLib){

        $this->attach($bigQueryLib);

    }

    public function bsegQuery($params){



    }

    public function month($params){

        $sql=
        " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$params['enterprise']."' AS enterprise, '".$params['account']."' AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate".
        " FROM ".
        " (SELECT BUKRS, BUDAT, DMBTR FROM `informe-211921.MULTIVA.BSEGAIO`".
        " WHERE CAST(SUBSTR(BUDAT,5,2) AS INT64) = ".$params['month'].
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')".
        " AND HKONT = '".$params['account']."') ORDER BY CAST(BUDAT AS INT64);";


        //echo($sql.'<br><br><br>');

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }

    public function year($params){

        $sql=
        " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$params['enterprise']."' AS enterprise, '".$params['account']."' AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate, SGTXT AS description".
        " FROM ".
        " (SELECT BUKRS, BUDAT, DMBTR FROM `informe-211921.MULTIVA.BSEGAIO`".
        " WHERE CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')".
        " AND HKONT = '".$params['account']."') ORDER BY CAST(BUDAT AS INT64);";


        //echo($sql.'<br><br><br>');

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }
    
}






?>