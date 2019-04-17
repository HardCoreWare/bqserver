<?php

class breakdowntable extends Controller{



    public function day($year,$month,$day,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownTableModel(new BigQuery('informe-211921'));
        $breakdown = $demo->day(["year"=>$year,"month"=>$month,"day"=>$day,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }
 
    public function month($year,$month,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownTableModel(new BigQuery('informe-211921'));
        $breakdown = $demo->month(["year"=>$year,"month"=>$month,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

    public function year($year,$enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownTableModel(new BigQuery('informe-211921'));
        $breakdown = $demo->year(["year"=>$year,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

    public function all($enterprise){

        header("Content-Type: application/json");
        $demo = new BreakdownTableModel(new BigQuery('informe-211921'));
        $breakdown = $demo->all(["enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}

?>