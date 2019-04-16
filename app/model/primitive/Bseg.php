<?php

abstract class BsegModel extends Connection implements BsegInterface{


    public function count(){

        $sql = "SELECT COUNT(*) AS rowCount FROM `informe-211921.MULTIVA.BSEGAIO`";
        $count = $this->$bigQueryLib->select($sql);
        return $count;

    }

    public abstract function subtotal($params);
    public abstract function breakdown($params);
    public abstract function ammount($params);
    
}

