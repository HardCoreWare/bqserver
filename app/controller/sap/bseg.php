<?php

class bseg extends Controller{
 
    public function breakdown($year,$month,$account,$enterprise){

        $demo = new Demo(BigQuery::getInstance('informe-211921'));
        $breakdown = $demo->breakdown(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}


?>