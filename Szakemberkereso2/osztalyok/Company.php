<?php
class Company
{
    protected $id;
    protected $name;
    protected $services;
    protected $telnumber;
    protected $address;
    protected $password;
    protected $evaluation=array();
    protected $eval=0;

    /**
     * @param $name
     * @param $services
     * @param $telnumber
     * @param $address
     * @param $password
     */
    public function __construct($name, $services, $telnumber, $address, $password)
    {
        $this->name = $name;
        $this->services = $services;
        $this->telnumber = $telnumber;
        $this->address = $address;
        $this->password = $password;
    }


    public function setEvaluation($eval){
        array_push($this->evaluation,$eval);
        $m=count($this->evaluation);
        $erdm=0;
        for ($i=0;$i<$m;$i++){
            $erdm=$erdm+$this->evaluation[$i];
        }
        $this->eval=$erdm/$m;
    }
    public function getEvaluation(){

        return $this->eval;
    }

    public function registration(){
        include "myDb.php";

        $db=new myDb();
        $a=$this->name;
        $b=$this->services;
        $c=$this->telnumber;
        $d=$this->address;
        $e=$this->eval;
        $f=$this->password;
        $sql="INSERT INTO Company(name, services,telnumber,address,evaluation,password) VALUES('$a','$b','$c','$d','$e','$f')";
        $query=$db->connection->query($sql);
        if ($query){
            return true;
        }
        else {
            return false;
        }


    }


}
//$ms=new Company("dsfsd","1","23123","4fdsf","dasd");
//$ms1= $ms->registration();
//if ($ms1){
//    echo "siker";
//}
//else{
//    echo "kudarc";
//}

