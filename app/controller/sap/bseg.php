<?php

class bseg extends Controller
{
 
    public function breakdown($year,$month,$account,$enterprise){

        $this->module('Demo');
        $bqLib= BigQuery::getInstance('informe-211921');
        $demo = new Pit\BigQuery\Model\Demo($bqLib);
        $breakdown = $demo->breakdown(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);

        echo(json_encode($breakdown));
        
    }

}


?>