<?php

class Offer
{
    protected $id;
    protected $adventismentId;
    protected $price;
    protected $discription;

    /**
     * @param $adventismentId
     * @param $price
     * @param $discription
     */
    public function __construct($adventismentId, $price, $discription)
    {
        $this->adventismentId = $adventismentId;
        $this->price = $price;
        $this->discription = $discription;
    }


}