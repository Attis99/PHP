<?php

class Advertisment
{
    protected $id;
    protected $clientUsername;
    protected $service;
    protected $name;
    protected $companyOrNot;
    protected $description;

    /**
     * @param $clientUsername
     * @param $service
     * @param $name
     * @param $companyOrNot
     * @param $description
     */
    public function __construct($clientUsername,$service, $name, $companyOrNot, $description)
    {
        $this->clientUsername=$clientUsername;
        $this->service = $service;
        $this->name = $name;
        $this->companyOrNot = $companyOrNot;
        $this->description = $description;
    }
    public function register(){
        include "myDb.php";
        $db=new myDb();
        $clientusern=$this->clientUsername;
        $service=$this->service;
        $name=$this->name;
        $compOrNot=$this->companyOrNot;
        $disc=$this->description;
        $sql="INSERT INTO Advertisment(clientusername,name,service,companiOrNot,discreptios) VALUES ('$clientusern','$name','$service','$compOrNot','$disc')";
        $result=($db->connection->query($sql));
        if ($result){
            return true;
        }
        else{
            return false;
        }





    }



}