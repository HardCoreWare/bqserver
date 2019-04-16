<?php

class bseg extends Controller{
 
    public function breakdown_by_month($year,$month,$account,$enterprise){

        $demo = new Demo(new BigQuery('informe-211921'));
        $breakdown = $demo->breakdownByMonth(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}


?>