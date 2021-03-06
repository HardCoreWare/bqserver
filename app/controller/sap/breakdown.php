<?php

class breakdown extends Controller{

    public function day($year,$month,$day,$account,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->day(["year"=>$year,"month"=>$month,"day"=>$day,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }
 
    public function month($year,$month,$account,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->month(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

    public function year($year,$account,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->year(["year"=>$year,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

    public function all($account,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownModel(new BigQuery('informe-211921'));
        $breakdown = $demo->all(["account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}


?>