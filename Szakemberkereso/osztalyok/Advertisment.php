<?php

class Advertisment
{
    protected $id;
    protected $clientID;
    protected $service;
    protected $name;
    protected $companyOrNot;
    protected $description;

    /**
     * @param $service
     * @param $name
     * @param $companyOrNot
     * @param $description
     */
    public function __construct($clientID,$service, $name, $companyOrNot, $description)
    {
        $this->clientID=$clientID;
        $this->service = $service;
        $this->name = $name;
        $this->companyOrNot = $companyOrNot;
        $this->description = $description;
    }
    public function register(){
        $db=new mysqli('localhost','admin','rekszi','Szakemberkereso');
        $clientusern=$this->clientID;
        $service=$this->service;
        $name=$this->name;
        $compOrNot=$this->companyOrNot;
        $disc=$this->description;
        $sql="INSERT INTO Advertisment(clientusername,service,name,companiOrNot,discreptios) VALUES ('$clientusern','$service','$name','$compOrNot','$disc')";
        $result=($db->query($sql));
        if ($result){
            return true;
        }
        else{
            return false;
        }





    }



}