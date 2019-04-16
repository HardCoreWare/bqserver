<?php

class bseg extends Controller{
 
    public function breakdown($year,$month,$account,$enterprise){

        $this->module('Demo');
        $bqLib=new BigQuery('informe-211921');
        $demo = new Demo();
        $demo->attach($bqLib);
        $breakdown = $demo->breakdown(["year"=>$year,"month"=>$month,"account"=>$account,"enterprise"=>$enterprise]);
        echo(json_encode($breakdown));
        
    }

}


?>