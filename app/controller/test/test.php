<?php

class test extends Controller
{
    
    public function tester(){

        echo('ok');

    }

    public function parrot($any){

        echo($any);

    }

    public function server(){

        echo(json_encode($_SERVER));

    }

}



?>