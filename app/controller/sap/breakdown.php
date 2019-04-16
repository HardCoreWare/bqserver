<?php

class breakdown extends Controller{
 
    public function month($year,$month,$account,$enterprise){

        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->month(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

    public function year($year,$account,$enterprise){

        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->year(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}


?>