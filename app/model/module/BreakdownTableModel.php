<?php

class BreakDownTableModel extends Connection{

    public function __construct($bigQueryLib){

        $this->attach($bigQueryLib);

    }

    public function day($params){


        $sql=
        " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$params['enterprise']."' AS enterprise, HKONT AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate, KOSTL AS costCenter".
        " FROM ".
        " (SELECT BUKRS, BUDAT, DMBTR, SGTXT, KOSTL, HKONT FROM `informe-211921.MULTIVA.BSEGAIO`".
        " WHERE".
        " CAST(SUBSTR(BUDAT,5,2) AS INT64) = ".$params['month'].
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
        " AND CAST(SUBSTR(BUDAT,7,2) AS INT64) = ".$params['day'].
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')".
        " AND HKONT IN (SELECT DISTINCT(account) FROM `informe-211921.MULTIVA.CUENTAS`))".
        " ORDER BY CAST(BUDAT AS INT64);";


        //echo($sql.'<br><br><br>');

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }

    public function month($params){

        $sql=
        " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$params['enterprise']."' AS enterprise, HKONT AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate, KOSTL AS costCenter".
        " FROM ".
        " (SELECT BUKRS, BUDAT, DMBTR, SGTXT, KOSTL, HKONT FROM `informe-211921.MULTIVA.BSEGAIO`".
        " WHERE".
        " CAST(SUBSTR(BUDAT,5,2) AS INT64) = ".$params['month'].
        " AND CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
        " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = 'BANCO')".
        " AND HKONT IN (SELECT DISTINCT(account) FROM `informe-211921.MULTIVA.CUENTAS`))".
        " ORDER BY CAST(BUDAT AS INT64);";

        //echo($sql.'<br><br><br>');

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }

    public function year($params){

        $enterpriseArray=explode("-",$params['enterprise']);

        $subquerys=[];

        for ($i=0; $i <count($enterpriseArray) ; $i++) { 

            $enterprise=$enterpriseArray[$i];

            $sql=
            " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$enterprise."' AS enterprise, HKONT AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate, KOSTL AS costCenter".
            " FROM ".
            " (SELECT BUKRS, BUDAT, DMBTR, SGTXT, KOSTL, HKONT FROM `informe-211921.MULTIVA.BSEGAIO`".
            " WHERE".
            " CAST(SUBSTR(BUDAT,1,4) AS INT64) = ".$params['year'].
            " AND KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = '".$enterprise."')".
            " AND HKONT IN (SELECT DISTINCT(account) FROM `informe-211921.MULTIVA.CUENTAS`))";
            //echo($sql.'<br><br><br>');

            $subquerys[]=$sql;

        }

        $uniquery=implode(" UNION ALL ",$subquerys)." ORDER BY CAST(BUDAT AS INT64);";

        $breakdown = $this->bigQueryLib->select($uniquery);

        return $breakdown;

    }

    public function all($params){

        $enterpriseArray=explode("-",$params['enterprise']);

        for ($i=0; $i <count($enterprises) ; $i++) { 

            $enterprise=$enterprises[$i];

            $sql=
            " SELECT ROUND(CAST(DMBTR AS FLOAT64), 2) AS ammount, '".$enterprise."' AS enterprise, HKONT AS account,  BUKRS as sapSociety, CONCAT(SUBSTR(BUDAT,1,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS documentDate, KOSTL AS costCenter".
            " FROM ".
            " (SELECT BUKRS, BUDAT, DMBTR, SGTXT, KOSTL, HKONT FROM `informe-211921.MULTIVA.BSEGAIO`".
            " WHERE".
            " KOSTL IN (SELECT KOSTL FROM `informe-211921.MULTIVA.CECOS` WHERE MODULO = '".$enterprise."')".
            " AND HKONT IN (SELECT DISTINCT(account) FROM `informe-211921.MULTIVA.CUENTAS`))".
            " ORDER BY CAST(BUDAT AS INT64);";

        }

        //echo($sql.'<br><br><br>');

        $breakdown = $this->bigQueryLib->select($sql);

        return $breakdown;

    }

    
}

?>