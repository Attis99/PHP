<?php
namespace osztalyok;
class myDb
{
    public $connection;
    public $host='localhost';
    public $user='admin';
    public $password='rekszi';
    public $databese='Szakemberkereso';


    public function __construct()
    {

        $this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->databese);
    }
    public function insert($query){
      $rev=( $this->connection->query($query));



    }
    public function select($query){
        $q=$this->connection->query($query);
        if ($q){
            $result=$q->fetch_all(PDO::FETCH_ASSOC);
        }
        return $result;

    }

//    public function insertClient($name,$telefon,$address){
//
//       $sql="INSERT INTO clients (name,telnumber,address) VALUES ($name,$telefon,$address) ";
//        $this->connection->query($sql);
//
//    }
//    public function selectCostemer($query){
//        $q=$this->connection->query($query);
//        if ($q){
//            $result=$q->fetch_all(PDO::FETCH_ASSOC);
//        }
//        return $result;
//
//    }




}
