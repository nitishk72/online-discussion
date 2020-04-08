<?php

class DB 
{
    private $con;
    private $table;
    public $status;

    function __construct() {
        include './utils/env.php';
        $this->con = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);
    }

    function get($query){
        $sql = `SELECT {$query['params']} from {$query['table']}`;
        echo $sql;
        $con->query($sql);
    }

    function run($query){
        $this->status = FALSE;
        $this->status =  $this->con->query($query);
        return $this->status;
    }

}

new DB();