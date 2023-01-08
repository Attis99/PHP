<?php
include "Advertisment.php";
include "myDb.php";

 class Custemer
{
    protected $username;
    protected $name;
    protected $telnumber;
    protected $password;
    protected $evaluation=0;

     /**
      * @param $username
      * @param $name
      * @param $telnumber
      * @param $password
      */
     public function __construct($username, $name, $telnumber, $password)
     {
         $this->username = $username;
         $this->name = $name;
         $this->telnumber = $telnumber;
         $this->password = $password;
     }

    public function register(){
        //$dbb=new myDb();
        $db=new mysqli('localhost','admin','rekszi','Szakemberkereso');
        $username=$this->username;
        $name=$this->name;
        $telnumber=$this->telnumber;
        $password=$this->password;
       // $password=md5($password);

        $sql="INSERT INTO ugyfelek(username,name,telnumber,password) VALUES ('$username','$name','$telnumber','$password')";
        $query=$db->query($sql);
        if ($query){
            return true;
        }
        else{
            return false;
        }


    }
    public function addAdvertisment(Advertisment $a){
        $a->register($this->username);

//nemjo


    }




}



