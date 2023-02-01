<?php

class Offer
{
    protected $id;
    protected $sender_username;
    protected $adventismentId;
    protected $price;
    protected $discription;

    /**
     * @param $sender_username
     * @param $adventismentId
     * @param $price
     * @param $discription
     */
    public function __construct($sender_username, $adventismentId, $price, $discription)
    {
        $this->sender_username = $sender_username;
        $this->adventismentId = $adventismentId;
        $this->price = $price;
        $this->discription = $discription;
    }


    public function registration($send_username){
        include "myDb.php";
        $db=new myDb();
        $sql="INSERT INTO offer(sender_username, adventismentId,price,discription) VALUES ('$send_username','$this->adventismentId','$this->price','$this->discription')";
        $s=$db->connection->query($sql);
        if ($s){
           return true;
        }
        else {
            return false;
        }

    }


}
