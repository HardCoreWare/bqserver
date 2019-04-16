<?php

class breakdown extends Controller{

    public function day($year,$month,$day,$account,$enterprises){

        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->day(["year"=>$year,"month"=>$month,"day"=>$day,"account"=>$account,"enterprise"=>$enterprises]);
        echo(json_encode($breakdown));
        
    }
 
    public function month($year,$month,$account,$enterprises){

        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->month(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprises]);
        echo(json_encode($breakdown));
        
    }

    public function year($year,$account,$enterprises){

        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->year(["year"=>$year,"account"=>$account,"enterprise"=>$enterprises]);
        echo(json_encode($breakdown));
        
    }

}


?>